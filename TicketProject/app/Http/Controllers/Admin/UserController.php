<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UseraddmailController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
        // return view('admin.users');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data frontside enter
       $validatedData= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'mobilenumber'=>['required', 'digits:10'],
            'password' => ['required', 'confirmed'],
        ]);

        //store data
        $user = User::create($validatedData);

        //sendmail -> user add (admin)
        $maildata=['name'=>$user->name , 'email'=>$user->email, 'mobilenumber'=>$user->mobilenumber, 'password'=>$request->password];
        Mail::to($user->email)->send(new UseraddmailController($maildata));

        return redirect()->back()->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //user id find remove user
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');

    }
}
