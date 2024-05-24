<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class _AdminController extends Controller
{
    public function index() {
        return view('admin._index');
    }

    public function edit() {
        return view('admin.admins.change_password');
    }

    public function update(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth::user()->password  )) {

            return back();
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('admin/dashboard')->with('success', 'Password Updated!');

    }

}
