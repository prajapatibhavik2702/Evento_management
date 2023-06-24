<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\ValidatedData;


class OrganiserdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organiser = Auth::guard('organiser')->user();
        return view('organiser.profile',['organiser'=> $organiser]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $organiser = Auth::guard('organiser')->user();


        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|',
            'number' => 'required|string|digits:10',
            'description' => 'required|string',
        ]);

        $organiser->name=$request->name;
        $organiser->email=$request->email;
        $organiser->number=$request->number;
        $organiser->description=$request->description;

        $organiser->save();

        return redirect()->route('organiser.organiserdetails.index')->with('message', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
