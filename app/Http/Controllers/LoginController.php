<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Handle account login request
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) { // Helpdesk
            return redirect()->intended('/dashboard');
        } else if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2])) { // PIC
            PushKeNotifikasi();
            return redirect()->intended('/dashboard');
        } else if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 3])) { // Maintenance Server
            return redirect()->intended('/dashboard');
        } else if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 4])) { // Manager Area
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->intended('/login')->with(['error'=>'Email atau Password Salah']);
        }
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    public function getCredentials($request)
    {
        // The form field for providing username or password
        // have name of "username", however, in order to support
        // logging users in with both (username and email)
        // we have to check if user has entered one or another
        $email = $request->email;

        if ($email) {
            return [
                'email' => $email,
                'password' => $request->password
            ];
        }

        return $request->only('email', 'password');
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('users')->logout();
        return redirect('login');
    }
}