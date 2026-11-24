<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordOtpMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PasswordResetOtpController extends Controller
{
    public function requestForm(): View
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request): RedirectResponse
    {
        $request->validate(['email' => ['required', 'email']]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        $otp = (string) random_int(100000, 999999);

        DB::table('password_reset_otps')->where('email', $request->email)->delete();
        DB::table('password_reset_otps')->insert([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPasswordOtpMail($otp));

        return redirect()->route('password.otp.verify.form', ['email' => $request->email])
            ->with('status', 'Kode OTP telah dikirim ke email Anda.');
    }

    public function verifyForm(Request $request): View
    {
        return view('auth.verify-otp', ['email' => $request->query('email', $request->email)]);
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'otp' => ['required', 'digits:6'],
        ]);

        $record = DB::table('password_reset_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$record || now()->gt($record->expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau kadaluarsa.']);
        }

        return redirect()->route('password.otp.reset.form', ['email' => $request->email, 'otp' => $request->otp]);
    }

    public function resetForm(Request $request): View
    {
        return view('auth.reset-password-otp', [
            'email' => $request->query('email', $request->email),
            'otp' => $request->query('otp', $request->otp),
        ]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'otp' => ['required', 'digits:6'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $record = DB::table('password_reset_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$record || now()->gt($record->expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau kadaluarsa.']);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        $user->forceFill(['password' => Hash::make($request->password)])->save();

        DB::table('password_reset_otps')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password berhasil direset.');
    }
}
