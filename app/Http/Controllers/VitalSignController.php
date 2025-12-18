<?php

namespace App\Http\Controllers;

use App\Models\dialysis_session;
use App\Models\vital_sign;
use Illuminate\Http\Request;

class VitalSignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            //
            $vitals = vital_sign::all();
            return view("admin.vitalsigns.indexvitalsign", compact("vitals"));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create($session_id)
    {
        //
    $session = dialysis_session::findOrFail($session_id);
        return view("admin.vitalsigns.createvitalsign", compact("session"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      $request->validate([
        'session_id'=>'required',
        'blood_pressure'   => ['nullable', 'string', 'max:10'], 
        'heart_rate'       => ['nullable', 'integer', 'min:30', 'max:200'],
        'temperature'      => ['nullable', 'numeric', 'between:30,45'],
        'respiratory_rate' => ['nullable', 'integer', 'min:0', 'max:50'],
        'weight_before'    => ['nullable', 'numeric', 'min:0'],
        'weight_after'     => ['nullable', 'numeric', 'min:0'],
    ]);

    vital_sign::create([
        'session_id' => $request->session_id,
        'blood_pressure' => $request->blood_pressure,
        'heart_rate'     => $request->heart_rate,
        'temperature'    => $request->temperature,
        'respiratory_rate' => $request->respiratory_rate,
        'weight_before'  => $request->weight_before,
        'weight_after'   => $request->weight_after,
        
    ]);

    return redirect()->route('sessions.vitals', ['session' => $request->session_id])->with('success','Vital Sign Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(vital_sign $vitals)
    {
        //
        return view('admin.vitalsigns.indexvitalsign', compact('vitals'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vital_sign $vital)
    {
        //
         $session = dialysis_session::latest()->first();
        return view('admin.vitalsigns.editvitalsign',data: compact('session','vital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vital_sign $vital)
    {
        //
       $vital->update($request->all());
       return redirect()->route('sessions.vitals',['session' => $request->session_id])->with('success','Vital Sign Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vital_sign $vital)
    {
        //
        $vital->delete();
        return back()->with('success','Vital Sign Deleted Successfully');
    }
}
