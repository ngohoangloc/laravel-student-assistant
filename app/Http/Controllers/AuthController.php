<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        if (session()->has('user'))
            return redirect('/');
        else
            return view('auth.pages.login');
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $remember = $request->remember;

        $user = DB::table('users')->where('username', $credentials['username'])->first();

        if (!empty($user))
            if ( Hash::check($credentials['password'], $user->password))
            {
                session()->put('user', $user->username);
                session()->put('user_id', $user->id);
                session()->put('role', $user->role_id);

                return redirect('/');
            }
            else
            {
                return view('auth.login');
            }
        else
        {
            return view('auth.login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function register()
    {

    }

}
