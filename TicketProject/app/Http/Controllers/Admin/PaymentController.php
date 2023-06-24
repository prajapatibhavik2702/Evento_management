<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments=payment::all();
        // dd($payments);
        return view('admin.payments',compact('payments'));
    }
}
