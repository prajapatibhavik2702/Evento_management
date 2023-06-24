<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\ValidatedData;

class AdminDetailsController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile',['admin'=> $admin]);
    }



    public function update(Request $request)
    {

        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|',
            'crpassword' => 'required|string',
            'newpassword' => 'required|string',
        ]);
        // dd('hgf');

        if (!Hash::check($request->crpassword, $admin->password)) {

            return back()->with(['error' => 'Incorrect current password']);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('crpassword')) {
            $admin->password = Hash::make($request->newpassword);
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('message', 'Profile updated successfully!');
    }

}
