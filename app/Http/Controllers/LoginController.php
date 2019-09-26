<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function getLogin()
    {
        return view('demo-login');
    }

    function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if($username == 'laravel' && $password == '123')
        {
            $isValid = true;
            return view('demo-login', ['isValid' => true]);
        }
        return view('demo-login', ['username' => $username, 'password' => $password]);
    }
}
