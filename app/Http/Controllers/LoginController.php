<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // return redirect()->away('https://sso.uiii.ac.id/login');
        return view('login.index');
    }

    public function auth(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $credential['username'], 'password' => $credential['password']))) {
            return redirect('/')->with('success', 'Selamat datang kembali, ' . auth()->user()->name);
        } else {
            return redirect()->route('login')
                ->with('loginError', 'Please enter a correctly email and password. ');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect()->away('https://sso.uiii.ac.id/login');
        return redirect('/');
    }
}
