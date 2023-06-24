<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'payment_no',
        'stripe_id',
        'qnt',
        'price',
        'payment_amount',
        'payment_method',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
