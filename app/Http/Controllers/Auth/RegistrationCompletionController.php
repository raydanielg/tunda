<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationCompletionController extends Controller
{
    public function show()
    {
        if (!session('registration_user_id')) {
            return redirect()->route('register');
        }

        return view('auth.complete-registration');
    }

    public function store(Request $request)
    {
        $userId = session('registration_user_id');

        if (!$userId) {
            return redirect()->route('register');
        }

        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'role' => ['required', 'in:user,mate_finder'],
        ]);

        $role = $validated['role'];

        if ($role === 'user') {
            $request->validate([
                'mkoa' => ['required', 'string', 'max:255'],
                'wilaya' => ['required', 'string', 'max:255'],
            ]);

            $user->update([
                'role' => 'user',
                'mkoa' => $request->input('mkoa'),
                'wilaya' => $request->input('wilaya'),
            ]);

            session()->forget('registration_user_id');
            Auth::login($user);

            return redirect('/home');
        }

        if ($role === 'mate_finder') {
            $request->validate([
                'phone_number' => ['required', 'string', 'max:20'],
            ]);

            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            $user->update([
                'role' => 'mate_finder',
                'phone_number' => $request->input('phone_number'),
                'verification_code' => $code,
            ]);

            session()->put('registration_pending_phone', $user->phone_number);

            return redirect()->route('registration.verify.phone');
        }

        return back()->withErrors(['role' => 'Chagua aina sahihi ya akaunti.']);
    }

    public function showPhoneVerification()
    {
        if (!session('registration_user_id') || !session('registration_pending_phone')) {
            return redirect()->route('register');
        }

        return view('auth.verify-phone');
    }

    public function verifyPhone(Request $request)
    {
        $userId = session('registration_user_id');

        if (!$userId) {
            return redirect()->route('register');
        }

        $request->validate([
            'verification_code' => ['required', 'string', 'size:6'],
        ]);

        $user = User::findOrFail($userId);

        if ($request->input('verification_code') !== $user->verification_code) {
            return back()->withErrors(['verification_code' => 'Namba ya kuthibitisha si sahihi. Jaribu tena.']);
        }

        $user->update([
            'phone_verified_at' => now(),
            'verification_code' => null,
        ]);

        session()->forget(['registration_user_id', 'registration_pending_phone']);
        Auth::login($user);

        return redirect('/home');
    }
}
