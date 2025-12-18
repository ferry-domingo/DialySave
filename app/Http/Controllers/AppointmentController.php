<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function markAsCanceled($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->status = 'canceled';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment marked as canceled.');
    }

    public function markAsCompleted($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->status = 'completed';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment marked as completed.');
    }

    public function index()
    {
        //
        $appointments = Appointment::with('patient')
            ->latest()
            ->paginate(10);

        // Calculate statistics
        $totalAppointments = Appointment::count();
        $scheduledCount = Appointment::where('status', 'scheduled')->count();
        $completedCount = Appointment::where('status', 'completed')->count();
        $canceledCount = Appointment::where('status', 'canceled')->count();

        return view('admin.appointments.index', compact(
            'appointments',
            'totalAppointments',
            'scheduledCount',
            'completedCount',
            'canceledCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $patients = Patient::all(); // Assuming you have a Patient model
        return view('admin.appointments.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'notes' => 'nullable|string|max:1000'
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment scheduled successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
        $patients = Patient::all();
        return view('admin.appointments.edit', compact('appointment', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'notes' => 'nullable|string|max:1000'
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
