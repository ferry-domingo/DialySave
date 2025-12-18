<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;

use Illuminate\Http\Request;
use App\Models\dialysis_session;

class DashboardController extends Controller
{
    //

    public function index()
    {
        //
        $totalpatients = Patient::count();
        $malepatients = Patient::where('gender', 'male')->count();
        $femalepatients = Patient::where('gender', 'female')->count();

        // Session counts
        $hemodialysisCount = Dialysis_Session::where('dialysis_type', 'hemodialysis')->count();
        $peritonealCount = Dialysis_Session::where('dialysis_type', 'peritoneal')->count();
        $activeSessions = Dialysis_Session::where(
            'status',
            'in_progress'
        )->count();

        // Recent sessions
        $recentSessions = Dialysis_Session::with('patient')
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();

        // Upcoming appointments
        $upcomingAppointments = Appointment::with('patient')
            ->where('date', '>=', today())
            ->orderBy('date')
            ->take(5)
            ->get();

        // Sessions over time (last 6 months)
        $sessionsOverTime = [];
        $hemodialysisData = [];
        $peritonealData = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->format('M Y');

            $labels[] = $month;
            $hemodialysisData[] = Dialysis_Session::where('dialysis_type', 'hemodialysis')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $peritonealData[] = Dialysis_Session::where('dialysis_type', 'peritoneal')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        // Age distribution
        $ageGroups = [
            '18-30' => Patient::whereBetween('birthdate', [
                now()->subYears(30),
                now()->subYears(18)
            ])->count(),
            '31-45' => Patient::whereBetween('birthdate', [
                now()->subYears(45),
                now()->subYears(31)
            ])->count(),
            '46-60' => Patient::whereBetween('birthdate', [
                now()->subYears(60),
                now()->subYears(46)
            ])->count(),
            '61-75' => Patient::whereBetween('birthdate', [
                now()->subYears(75),
                now()->subYears(61)
            ])->count(),
            '75+' => Patient::whereDate('birthdate', '<=', now()->subYears(75))->count(),
        ];

        // Session success rate
        $totalSessions = Dialysis_Session::count();
        $successfulSessions = Dialysis_Session::where('status', 'completed')->count();
        $successRate = $totalSessions > 0
            ? round(($successfulSessions / $totalSessions) * 100, 2)
            : 0;

        // Average session duration
        $sessions = Dialysis_Session::where('status', 'completed')->get();

        $avgDuration = $sessions->avg(function ($s) {
            return strtotime($s->updated_at) - strtotime($s->created_at);
        });

        // Convert to hours
        $avgHours = $avgDuration ? round($avgDuration / 3600, 2) : 0;

        return view('admin.dashboard', compact(
            'totalpatients',
            'malepatients',
            'femalepatients',
            'hemodialysisCount',
            'peritonealCount',
            'activeSessions',
            'recentSessions',
            'labels',
            'hemodialysisData',
            'peritonealData',
            'ageGroups',
            'upcomingAppointments',
            'successRate',
            'avgHours'
        ));

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
        $request->merge([
            'contact_no' => str_replace('-', '', $request->contact_no),
        ]);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'contact_no' => ['nullable', 'regex:/^09\d{9}$/'],
            'blood_type' => 'nullable|string|max:5',
            'medical_conditions' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully!');

    }
}
