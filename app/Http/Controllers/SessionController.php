<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'You have successfully logged in!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }

    public function destory() {

        auth()->logout();

        return redirect('/')->with('success', 'You have successfully log out!');

    }
}
