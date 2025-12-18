<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $login = $request->input('login'); // patient_id or email
        $password = $request->input('password');

        $user = null;

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            // login via email
            $user = \App\Models\User::where('email', $login)->first();
        } else {
            // login via patient_id
            $patient = \App\Models\Patient::where('patient_id', $login)->first();
            if ($patient) {
                $user = $patient->user; // get related user
            }
        }

        // check password
        if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            // redirect based on role
            if ($user->role === 'patient') {
                return redirect()->route('patient.dashboard');
            }

            return redirect()->route('admin.dashboard');
        }

        // authentication failed
        throw \Illuminate\Validation\ValidationException::withMessages([
            'login' => __('auth.failed'),
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
