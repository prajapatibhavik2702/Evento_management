<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrgAllowController;
use App\Mail\OrgRejectController;
use App\Mail\OrgAdddController;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisers=Organiser::all();
        return view('admin.organiser',compact('organisers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addorganiser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ///validate data admin add details
        $validatedData= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'number'=>['required', 'digits:10'],
            'description'=>['nullable'],
        ]);
        // Generate a random password
        $randpassword = Str::random(10); // Change the length as needed

        // Hash the password
        $hashedPassword = Hash::make($randpassword);

        //$user store database variable
        $user = Organiser::create($validatedData);
        $user->password = $hashedPassword;
        $user->status = 'Active';
        $user->save();

        //mail send to organiser by admin add organiser
        $maildata=['name'=>$user->name , 'email'=>$user->email, 'number'=>$user->number, 'password'=>$randpassword];
        Mail::to($user->email)->send(new OrgAdddController($maildata));

        return redirect()->back()->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            // Generate a random password
            $randpassword = Str::random(10); // Change the length as needed

            // Hash the password
            $hashedPassword = Hash::make($randpassword);

            // Update the user record with the new password
            $organiser = Organiser::find($id);
            //store data
            $organiser->password = $hashedPassword;
            $organiser->status = 'Active';
            $organiser->save();

            //send mail organiser request approved
            $maildata=['name'=>$organiser->name , 'email'=>$organiser->email ,'password'=>$randpassword];
            Mail::to($organiser->email)->send(new OrgAllowController($maildata));

            return redirect('admin/organiser')->with('message','Mail send Success & Allow!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //user data id delete fatch
        $user = Organiser::find($id);
        $user->delete();

        //send mail admin reject the request
        $maildata=['name'=>$user->name,'email'=>$user->email ];
        Mail::to($user->email)->send(new OrgRejectController($maildata));

        return redirect()->route('admin.organiser.index')->with('success', 'Admin deleted successfully.');

    }
}
