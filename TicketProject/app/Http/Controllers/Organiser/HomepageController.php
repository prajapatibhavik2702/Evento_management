<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;


class HomepageController extends Controller
{
    public function index()
    {
        $events=Event::get();
        $categorys=Category::get();
        return view('homepage.index',compact('events','categorys'));
    }
}
