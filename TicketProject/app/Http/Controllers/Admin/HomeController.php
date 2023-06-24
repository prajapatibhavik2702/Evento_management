<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Models\Organiser;
use App\Models\Event;
use App\Models\payment;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalorganiser=Organiser::count();
        $totalevent=Event::count();
        $totalticket=payment::count();
        $total_amount=payment::sum('payment_amount');
        $active_event=Event::where('status','active')->count();
        $inactive_event=Event::where('status','inactive')->count();



        return view('admin.dashboard')->with([
            'total_users'=>  $totalUsers,
            'total_organiser' => $totalorganiser,
            'total_event'=> $totalevent,
            'total_ticket'=>$totalticket,
            'total_amount'=>$total_amount,
            'active_events'=>$active_event,
            'inactive_events'=>$inactive_event,
            ]) ;

    }
}
