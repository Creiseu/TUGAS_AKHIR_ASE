<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        $isLoggedIn = Auth::check();
        return view('auth.login', compact('isLoggedIn'));
    }

    public function buat(): View
    {   
        $isLoggedIn = Auth::check();
        return view('auth.admin', compact('isLoggedIn'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
       // Autentikasi pengguna
        $request->authenticate();

        // Regenerate session setelah autentikasi berhasil
        $request->session()->regenerate();

        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Periksa userType
            if (Auth::user()->userType === 'user') {
                // Redirect ke dashboard admin
                return redirect()->route('dashboard');
            } else {
                // Hapus sesi untuk pengguna yang bukan admin
                Auth::logout();
                
                // Redirect ke halaman login dengan pesan error
                return redirect()->route('login')->withErrors(['email' => 'The access only for customer.']);
            }
        }

        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->route('login');
    }

    public function kirim(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Regenerate session setelah autentikasi berhasil
        $request->session()->regenerate();

        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Periksa userType
            if (Auth::user()->userType === 'admin') {
                // Redirect ke dashboard admin
                return redirect()->route('admin.dashboard');
            } else {
                // Hapus sesi untuk pengguna yang bukan admin
                Auth::logout();
                
                // Redirect ke halaman login dengan pesan error
                return redirect()->route('login')->withErrors(['email' => 'The access only for admin.']);
            }
        }

        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->route('login');
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
