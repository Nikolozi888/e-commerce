<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create() {
        return view('register.create');
    }

    public function store(Request $request) {

        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required',
            'password' => 'required|min:7|max:255',
        ]);
        
        // Create a new User instance
        $user = new User();
        $user->fill($attributes); // Fill the user attributes
        $user->password = Hash::make($request->password); // Hash the password before saving
    
        $user->save(); // Save the user to the database
    
        auth()->login($user); // Log in the user
    
        return redirect('/')->with('success', 'You have successfully registered!');
        
    }

    public function edit() {
        return view('profile.change_password');
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

        return redirect('/')->with('success', 'Password Updated!');

    }

    
    
}
