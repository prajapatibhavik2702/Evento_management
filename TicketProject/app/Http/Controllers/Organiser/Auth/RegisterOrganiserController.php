<?php

namespace App\Http\Controllers\Organiser\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


class RegisterOrganiserController extends Controller
{
    public function create(): View
    {
        return view('organiser.auth.register');
    }



    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Organiser::class],
            'number' => ['required' ,'numeric'],
            'description' => ['required'],
        ]);

        $organiser = Organiser::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'description'=>$request->description,
            'status'=>'inactive',
        ]);

        event(new Registered($organiser));

        Auth::login($organiser);

        return redirect(RouteServiceProvider::ORGANISER_HOME);
    }
}
