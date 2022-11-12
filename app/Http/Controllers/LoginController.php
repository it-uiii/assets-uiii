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
        return redirect()->away('https://sso.uiii.ac.id/login');
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
        // if (Auth::attempt($credential)) {
        //     $request->session()->regenerate();
        //     return redirect('/')->with('success', 'Selamat datang kembali, ' . auth()->user()->name);
        // }
    }

    // public function signin(Request $request)
    // {
    //     $client = new Client();
    //     $headers = [
    //         'Authorization' => 'Bearer eyJhbGciOiJIUzUxMiIsImlhdCI6MTY2NjcxODU5NCwiZXhwIjoxODIyMjM4NTk0fQ.eyJ1c2VybmFtZSI6ImpvaG4ifQ.LWJ0xETrL4XQ-CYnzyyGgLeUiEkccLMxIeY3IyEYthgL3i74fsNudNd65RX0OtBUI-ceB53lyMPgMVBmP4q71g'
    //     ];
    //     $response = $client->get(
    //         'http://192.168.74.57:8090/api/v1/login',
    //         [
    //             'form_params' => [
    //                 'key' => 'eiWee8ep9due4deeshoa8Peichai8Eih',
    //                 'email' => $request->email,
    //                 'password' => $request->password,
    //                 'action' => 'login',
    //                 $headers
    //             ],
    //             'cookies' => true
    //         ]
    //     );
    //     $xml = $response;
    //     echo $xml;
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->away('https://sso.uiii.ac.id/login');
    }
}
