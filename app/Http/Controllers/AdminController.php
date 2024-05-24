<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.admins.all_admins',[
            'admins' => User::where('role', 'admin')->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.add_admins');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required',
            'password' => 'required|min:7|max:255',
        ]);
        
        $attributes['role'] = 'admin';

        $attributes['password'] = Hash::make($request->password);
    
        User::create($attributes);

    
        return redirect('/admin/admins')->with('success', 'You have successfully add admin!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admin.admins.edit_admins',[
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'phone' => 'required|unique:users,phone,' . $admin->id,
            'address' => 'required',
            'password' => 'nullable|min:7|max:255',
        ]);
        
        $attributes['role'] = 'admin';

        $admin->update($attributes);

        return redirect('/admin/admins')->with('success', 'You have successfully update admin!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return back()->with('success', 'You have successfully delete admin!');
    }
}
