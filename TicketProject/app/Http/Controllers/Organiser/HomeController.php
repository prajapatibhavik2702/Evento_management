<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Models\Organiser;
use App\Models\Event;
use App\Models\payment;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $eventable_id = Auth::guard('organiser')->id();

        // $count_event=Event::find($eventable_id)->count();
        $eventCount = Event::where('eventable_id', $eventable_id)->count();
        // dd($eventCount);
        $active_event=Event::where('eventable_id',$eventable_id)->where('status','active')->count();
        $inactive_event=Event::where('eventable_id',$eventable_id)->where('status','inactive')->count();
        $avalible_ticket=Event::where('eventable_id',$eventable_id)->sum('available_ticket');



        //amount mate
        $event = Event::where('eventable_id', $eventable_id)->get();

        $amount = 0;

        foreach($event as $ev){
            $event_id = $ev->id;
            // dump($event_id);

            $totalAmount = Payment::where('event_id', $event_id)->sum('payment_amount');
            $amount += $totalAmount;
            // dump($amount);
        }

        //end amount code

        return view('organiser.dashboard')->with([
            'event_Count'=>  $eventCount,
            'active_event' => $active_event,
            'inactive_event'=> $inactive_event,
            'avalible_ticket'=>$avalible_ticket,
            'total_amount'=>$amount,
            ]) ;
    }
}
