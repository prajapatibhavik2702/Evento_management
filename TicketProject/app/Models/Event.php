<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Speaker;
use App\Models\payment;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
        'date',
        'start_time',
        'end_time',
        'total_ticket',
        'available_ticket',
        'price',
        'address',
        'city',
        'state',
        'pincode',
        'status',
        'creatable',
    ];

    public function eventable()
    {
        return $this->morphTo();
    }

    //many to many polimorfic relation speaker
    public function speaker(){

        return $this->belongsToMany(Speaker::class,'event_speaker','event_id','speaker_id');
        }


        public function payments()
        {
            return $this->hasMany(Payment::class);
        }

}
