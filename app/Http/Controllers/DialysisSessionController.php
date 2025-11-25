<?php

namespace App\Http\Controllers;

use App\Models\lab_result;
use App\Models\Patient;
use App\Models\vital_sign;
use Illuminate\Http\Request;
use App\Models\dialysis_session;

class DialysisSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       public function showLabs($session_id)
{
    $session = dialysis_session::findOrFail($session_id);
    $lab_results = lab_result::where('session_id', $session_id)->get();

    return view('admin.labresult.sessionlabresult', compact('session', 'lab_results'));
}
    public function showVitals($session_id)
{
    $session = dialysis_session::findOrFail($session_id);
    $vitals = vital_sign::where('session_id', $session_id)->get();

    return view('admin.vitalsigns.sessionvitals', compact('session', 'vitals'));
}

   public function index()

{
    $totalSessions = dialysis_session::count();

    $dialysis_sessions = dialysis_session::with('vital_signs')->paginate(5);
    $hemodialysisCount = dialysis_session::Where('dialysis_type','hemodialysis')->count();
    $peritonealCount = dialysis_session::Where('dialysis_type','peritoneal')->count();
    return view("admin.dialysis_session.indexsession", compact("dialysis_sessions",'totalSessions','hemodialysisCount','peritonealCount'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $patients = Patient::all(); 
        return view('admin.dialysis_session.createsession', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'patient_id' => 'required',
            'session_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'dialysis_type'=> 'required',
            'notes' => 'required',
        ]);

            dialysis_session::create([
            'patient_id' => $request->patient_id,
            'session_date' => $request->session_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'dialysis_type' => $request->dialysis_type,
            'notes' => $request->notes,
        ]);

        return redirect()->route('sessions.index')->with('success','');
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
    public function edit(dialysis_session $session)
    {
        //
        $patients = Patient::all(); 
        return view('admin.dialysis_session.editsession', compact('session','patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dialysis_session $session)
    {
        //
        $session->update($request->all());
        return redirect()->route('sessions.index')->with('success','Session Updated Successfullys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dialysis_session $session)
    {
        //
        $session->delete();
        return redirect()->route('sessions.index')->with('success','Session Deleted Successfully');
    }
}
