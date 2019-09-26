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
        return $username . ' - ' . $password;
    }
}
