<?php

namespace App\Http\Controllers;


use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patients = Patient::latest()->paginate(5);
        $totalpatients = Patient::count();
        $malepatients = Patient::Where('gender', 'male')->count();
        $femalepatients = Patient::Where('gender', 'female')->count();
          return view('admin.patients.indexpatient', compact('patients','totalpatients','malepatients','femalepatients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.patients.createpatient');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'full_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:5',
            'medical_conditions' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully!');
    
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
    public function edit(Patient $patient)
    {
        //
        return view('admin.patients.editpatient',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success','Patient Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
        $patient->delete();
        return redirect()->route('patients.index')->with('success','Patient Deleted Successfully');
    }
}
