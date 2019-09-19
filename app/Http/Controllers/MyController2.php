<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController2 extends Controller
{
    public function getSum($num1, $num2)
    {
        echo $num1 . ' + ' . $num2 . ' = ' . ($num1 + $num2);
    }
}
