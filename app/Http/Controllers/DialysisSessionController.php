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

    public function print(dialysis_session $session)
{
    $session->load('patient', 'vital_sign', 'lab_result');
    return view('admin.dialysis_session.print', compact('session'));
}
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
        $dialysis_sessions = dialysis_session::orderBy('created_at', 'desc')->paginate(5);
        $hemodialysisCount = dialysis_session::Where('dialysis_type', 'hemodialysis')->count();
        $peritonealCount = dialysis_session::Where('dialysis_type', 'peritoneal')->count();

        foreach ($dialysis_sessions as $session) {
         $session->status = ($session->vital_sign && $session->lab_result) ? 'completed' : 'in_progress';
         $session->save();
        }

        return view("admin.dialysis_session.indexsession", compact("dialysis_sessions", 'totalSessions', 'hemodialysisCount', 'peritonealCount'));
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
         // Kunin ang last OR #
        $lastOR = dialysis_session::orderBy('id', 'desc')->value('or_number');

        // If walang laman table (first record)
        if (!$lastOR) {
            $newOR = 10001;
        } else {
            $newOR = intval($lastOR) + 1;
        }

        $request->validate([
            'patient_id' => 'required',
            'dialysis_type' => 'required',
            'notes' => 'nullable',
        ]);

        dialysis_session::create([
            'or_number' => $newOR,
            'patient_id' => $request->patient_id,
            'dialysis_type' => $request->dialysis_type,
            'notes' => $request->notes,
        ]);

        return redirect()->route('sessions.index')->with('success', 'Session Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(dialysis_session $session)
    {
        //
        return view('admin.dialysis_session.showsession', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dialysis_session $session)
    {
        //
        $patients = Patient::all();
        return view('admin.dialysis_session.editsession', compact('session', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dialysis_session $session)
    {
        //
        $session->update($request->all());
        return redirect()->route('sessions.index')->with('success', 'Session Updated Successfullys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dialysis_session $session)
    {
        //
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Session Deleted Successfully');
    }
}
