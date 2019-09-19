<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function getXinChao($ten, $namsinh){
        return 'Xin chao ban <b>' . $ten . '</b><br>Co tuoi la: ' . (date("Y") - $namsinh);
    }

    function getTamBiet($ten, $namsinh = null){
        return 'Tam biet <b>' . $ten . '</b><br>Hen gap lai ban.';
    }
}
