<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    //one to many polimorfic relation speakers
    public function speakerable()
    {
        return $this->morphTo();
    }

    //many to many polimorfic relation events
    public function event(){
        return $this->belongsToMany(Event::class,'event_speaker','speaker_id','event_id');
        }


}
