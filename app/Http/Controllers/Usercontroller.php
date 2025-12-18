<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
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
    public function createForPatient($patient_id)
    {
        //
        $patient = Patient::findOrFail($patient_id);
        $users = User::with('roles')->get();

        return view('admin.accounts.createuser', [
            'patient_id' => $patient_id,
            'patient' => $patient,
        ]);
    }
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
            'password' => 'required|string|uppercase|min:3|confirmed',
            'role' => 'required|string|in:admin,patient',
            "email" => "nullable|email|unique:users,email|max:255",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);


        session()->push('created_users', [
            'role' => $request->role,
            'name' => $user->name,
            'password' => $request->password,
            'email' => $user->email
        ]);

        $patient = Patient::find($request->patient_id);
        $patient->user_id = $user->id;
        $patient->save();

        return redirect()->route('users.createForPatient', $patient->id)->with('success', 'User Added Successfully!');
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
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
    }
}
