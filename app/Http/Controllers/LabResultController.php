<?php

namespace App\Http\Controllers;

use App\Models\dialysis_session;
use App\Models\lab_result;
use Illuminate\Http\Request;

class LabResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $lab_results = lab_result::latest()->paginate(5);
        return view("admin.labresult.indexlabresult", compact("lab_results"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($session_id)
    {
        //
        $session = dialysis_session::findorFail($session_id);
        return view("admin.labresult.createlabresult", compact("session"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'session_id' => 'required|exists:dialysis_sessions,id',
        'hemoglobin' => 'nullable|numeric|min:0|max:99.9',
        'creatinine' => 'nullable|numeric|min:0|max:99.99',
        'potassium' => 'nullable|numeric|min:0|max:99.99',
        'remarks' => 'nullable|string|max:1000',
    ]);

    lab_result::create([
        'session_id' => $request->session_id,
        'hemoglobin' => $request->hemoglobin,
        'creatinine' => $request->creatinine,
        'potassium' => $request->potassium,
        'remarks' => $request->remarks,
    ]);

    return redirect()->route('labs.index', ['session' => $request->session_id])
                     ->with('success', 'Lab result saved successfully!');
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
    public function edit(lab_result $lab)
    {
        //
        return view('admin.labresult.editlabresult',compact('lab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lab_result $lab)
    {
        //
        $lab->update($request->all());
        return redirect()->route('sessions.labs',['session'=>$lab->session_id])->with('success','Lab Result Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lab_result $lab)
    {
        //
        $lab->delete();
        return redirect()->route('labs.index')->with('success','Lab Result Deleted Successfully');

    }
}
