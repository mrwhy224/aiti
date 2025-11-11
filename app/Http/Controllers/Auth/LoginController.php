<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('layouts.vuexy.pages.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string|regex:/^09\d{9}$/',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            switch (Auth::user()->roles->first()->role_group)
            {
                case 'site_owner':
                    return redirect()->route('admin_dashboard');
                case 'company_member':
                    return redirect()->route('company_dashboard');
                case 'default':
                    return redirect()->route('default_dashboard');
            }

        }

        return back()->withErrors([
            'phone' => 'اطلاعات به درستی وارد نشده اند',
        ])->onlyInput('phone');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
