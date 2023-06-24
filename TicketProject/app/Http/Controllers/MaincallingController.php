<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\payment;



class MaincallingController extends Controller
{
    public function index()
    {
        $events=Event::get();
        $categorys=Category::get();
        return view('homepage.index',compact('events','categorys'));
    }
    public function ticket()
    {
        dd();
        return view('homepage.extraticketview');
    }

    public function user_ticket($user_id)
    {
        // dd($user_id);

        $payments = Payment::where('user_id', $user_id)->get();
        // dd($payments);
        // $id = Payment::where('user_id', $user_id)->pluck('event_id');

        // $events=Event::find($id);

        // dd($event);
        return view('homepage.ticket',compact('payments'));
    }


}
