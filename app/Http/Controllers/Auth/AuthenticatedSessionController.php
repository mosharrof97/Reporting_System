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
     public function home(): View
     {
        return view('home');
     }

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
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if ($request->user()->role == 'admin') {
            $url=route('adminDashboard');
        }
        elseif($request->user()->role == 'user' ){
            $url = route('userDashboard');
        }
        else{
            $url = '/login';
        }
        return redirect()->intended($url );
    }

    // public function employee_store(LoginRequest $request): RedirectResponse
    // {
    // $request->authenticate();

    // $request->session()->regenerate();

    // $url = '';
    // if($request->user()->role == 'user' ){
    // $url = route('userDashboard');
    // }
    // else{
    // $url = '/login';
    // }
    // return redirect()->intended($url );
    // }

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
