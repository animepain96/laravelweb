<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function getHelloUser($user)
    {
        return view('hello-user', ['user' => $user]);
    }

    function getHelloWorld()
    {
        return '<h1>Hello World from My Controller!</h1>';
    }

    function getSum($num1, $num2)
    {
        return $num1 + $num2;
    }
}
