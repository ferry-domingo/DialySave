<?php

namespace App\Http\Controllers;

use session;

use App\Models\dialysis_session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientSession extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patient = Auth::user()->patient; // get patient related to logged-in user

        $dialysis_sessions = $patient->sessions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('patient.dialysis-session', compact('dialysis_sessions'));

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
        $patient = Auth::user()->patient; 

        $session = $patient->sessions()
            ->where('id', $id)
            ->first();

          return view('patient.showsession', compact('session'));
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
        //
    }
}
