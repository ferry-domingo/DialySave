<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendTemporaryPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
 /*   public function __construct()
{
    $this->middleware('role:admin');
}
*/
    public function index()
    {
        //
       $users = User::with('roles')->get();

        return view("admin.accounts.indexuser", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('admin.accounts.createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        "name" => "required|min:5|max:50",
        "role" => "required|min:3|max:10",
        "email" => "nullable|email|unique:users,email|max:255",
    ]);

    $generatedPassword = Str::random(10);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($generatedPassword),
        ]);

        $user->assignRole($request->role);


        session()->push('created_users', [
            'role' => $request->role,
            'name' => $user->name,
            'password' => $generatedPassword,
            'email' => $user->email
    ]);
    return redirect()->route('users.create')->with('success', 'User Added Successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());
        return redirect()->route('users.index')->with('success','User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with('success','User Deleted Successfully');
    }
}
