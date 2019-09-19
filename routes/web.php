<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     echo "<h1>Hello World!</h1>";
// });

// Route::get('/hello-world', function () {
//     echo "<h1>Hello World!</h1>";
// });

//Truyen tham so
// Route::get('/hello/{name}', function ($name) {
//     echo '<h1>Hello Mr. ' . $name . '</h1>';
// });

// Route::get('/hello/{name}/{year}', function ($name, $year) {
//     echo '<h1>Hello Mr. ' . $name . '</h1>';
//     echo '<p>You are <b>' . $year . '</b> year olds</p>';
// });

// Route::get('/hello/{name}/{year?}', function ($name, $year=26) {
//     echo '<h1>Hello Mr. ' . $name . '</h1>';
//     echo '<p>You are <b>' . $year . '</b> year olds</p>';
// });

// Tham so co the khong truyen vao
// Route::get('hello/{name}/{year?}', function ($name,$year=-1) {
//     $result = $year==-1 ? 'Hello <b> ' . $name . '</b>'
//         : 'Hello <b> ' . $name . '</b><p>You are ' . $year . ' year olds.</p>';
//     echo $result;
// });

//Rang buoc cac tham so truyen vao
//Route::get('cong/{num1}/{num2}', function ($num1, $num2) {
//    return $num1 + $num2;
//})->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

//Dinh nghia ten cho route
//Route::get('/demo-name', function () {
//    return 'demo name';
//})->name('demo-name');

//Demo Controller: MyController
//Route::get('hello-world', 'MyController@getHelloWorld');
//Route::get('sum/{num1}/{num2}', 'MyController2@getSum')->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

//VD01
//Route::get('/welcome/{ten}/{namsinh}', 'TestController@getXinChao');
//Route::get('/bye/{ten}/{namsinh?}', 'TestController@getTamBiet');

//View
//Route
//Route::get('hello/{user}', function ($user){
//    return view('hello-user', ['user' => $user]);
//});
//Controller
Route::get('hello/{user}', 'MyController@getHelloUser');
