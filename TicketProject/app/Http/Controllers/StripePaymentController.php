<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\payment;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketbookController;


class StripePaymentController extends Controller
{

    public function processPayment(Request $request)
    {
        // dd('sdgfdhf');

    //     Stripe::setApiKey(env('STRIPE_SECRET'));


    Stripe::setApiKey("sk_test_51MuEJxGHl4KbN4Xu8oNFxWSTZYPz5nikprJWSxBWY10sknyRv2y3x8h0IfugGcDErdqMF2gejRLAAUKk0oc54FN800vNJp0e66");

        $token = $request->input('stripeToken');
        $amount = $request->price;  // Amount in cents
        // dd($amount);
        try {
            $charge = Charge::create([
                'amount' => $amount*100,
                'currency' => 'inr',
                'source' => $token,
                'description' => 'Payment Description',
            ]);

            // dd($charge);

            $status=$charge->status;
            $st_id=$charge->balance_transaction;
            $method=$charge->payment_method_details->type;

            // store databse code,,

            $payment=Payment::create([

                'event_id'=>$request->eventid,
                'user_id'=>$request->userid,
                'payment_no'=>$request->rand_id,
                'qnt'=>$request->qnt,
                'price'=>$request->eventprice,
                'payment_amount'=>$request->price,
                'stripe_id'=>$st_id,
                'payment_method'=>$method,
                'status'=>$status,
            ]);



             //sendmail -> user add (admin)
                $maildata=['name'=>auth()->user()->name , 'email'=>auth()->user()->email, 'id'=>auth()->user()->id];
                Mail::to(auth()->user()->email)->send(new TicketbookController($maildata));

            // Payment successful, perform necessary actions (e.g., update database, send email, etc.)

              // Update the available tickets in the event table
                $event = Event::findOrFail($payment->event->id);
                $event->available_ticket -= $request->qnt;
                $event->save();


            return redirect()->route('checkout',$payment->id)->with('success', 'Payment was successful.');
        }
         catch (\Exception $e)
          {
            dd($e);
            //  return redirect('ticket_send')->with('error', 'Payment failed. Please try again later.');
        }
}


    public function showCheckoutForm($id)
    {
        $payment=payment::find($id);
        // $event=Event::find($id);
        // dd($payment);
        return view('homepage.ticketview',compact('payment'));
    }
}
