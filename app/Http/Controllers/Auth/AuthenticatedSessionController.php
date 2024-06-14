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
    $isLoggedIn = Auth::check();

    // Redirect ke dashboard admin jika userType adalah 'admin'
    if (Auth::user()->userType == 'admin') {
        return redirect()->route('admin.dashboard', compact('isLoggedIn'));
    }

    // Redirect ke dashboard biasa jika bukan 'admin'
    return redirect()->intended(route('dashboard'))->with('isLoggedIn', $isLoggedIn);}


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
