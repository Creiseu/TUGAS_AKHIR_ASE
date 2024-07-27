<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function processEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Cari pengguna dengan email yang diberikan dan userType 'user'
        $user = User::where('email', $request->email)
                    ->where('userType', 'user')
                    ->first();

        // Jika pengguna tidak ditemukan atau userType bukan 'user'
        if (!$user) {
            return back()->withErrors(['email' => 'The email does not belong to a valid user.']);
        }

        // Simpan email dalam session
        $request->session()->put('email', $user->email);

        // Redirect ke halaman reset password
        return redirect()->route('password.resetForm');
    }

    public function processEmailAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Cari pengguna dengan email yang diberikan dan userType 'user'
        $user = User::where('email', $request->email)
                    ->where('userType', 'admin')
                    ->first();

        // Jika pengguna tidak ditemukan atau userType bukan 'user'
        if (!$user) {
            return back()->withErrors(['email' => 'The email does not belong to a valid user.']);
        }

        // Simpan email dalam session
        $request->session()->put('email', $user->email);

        // Redirect ke halaman reset password
        return redirect()->route('password.resetForm.admin');
    }

    public function showResetForm(Request $request)
    {
        if (!$request->session()->has('email')) {
            return redirect()->route('password.processEmail')->withErrors(['email' => 'Email is required to reset password.']);
        }

        return view('auth.password_reset');
    }

    public function showResetFormAdmin(Request $request)
    {
        if (!$request->session()->has('email')) {
            return redirect()->route('password.processEmail.admin')->withErrors(['email' => 'Email is required to reset password.']);
        }

        return view('auth.admin.password_reset');
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email = $request->session()->get('email');

        if (!$email) {
            return redirect()->route('password.processEmail')->withErrors(['email' => 'Email is required to reset password.']);
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->forget('email');

        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }

    public function resetPasswordAdmin(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email = $request->session()->get('email');

        if (!$email) {
            return redirect()->route('password.processEmail')->withErrors(['email' => 'Email is required to reset password.']);
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->forget('email');

        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}
