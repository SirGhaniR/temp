<?php

namespace App\Http\Controllers;

use App\Mail\SignupReceived;
use App\Models\Signup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Honeypot (catch bots that fills all fields, including hidden one)
        if ($request->filled('website')) {
            return redirect()->route('home');
        }

        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:254'],
        ]);

        $signup = Signup::firstOrCreate(
            ['email' => $validated['email']],
            ['ip_address' => $request->ip()],
        );

        $admin = config('mail.admin_address');
        if ($signup->wasRecentlyCreated && $admin) {
            Mail::to($admin)->queue(new SignupReceived($signup));
        }

        return redirect()->route('home')->with('status', 'Thanks! We will be in touch.');
    }
}
