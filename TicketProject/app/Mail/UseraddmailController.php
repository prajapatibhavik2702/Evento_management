<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UseraddmailController extends Mailable
{
    use Queueable, SerializesModels;
    public  $maildata;
    /**
     * Create a new message instance.
     */
    public function __construct($maildata)
    {
        $this->maildata=$maildata;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin AddUser Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.orders.addusermail',

            with:[
                'name'=>$this->maildata['name'],
                'email'=>$this->maildata['email'],
                'mobilenumber'=>$this->maildata['mobilenumber'],
                'password'=>$this->maildata['password'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
