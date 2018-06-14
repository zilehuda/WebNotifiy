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

Route::get('send',function ()
{
  return "F";
  # code...
});
Route::post('send-message','MessageController@sendMessage');

Route::get('/', function () {
    return view('welcome');
});

Route::get('fire', function () {
    // this fires the event
    event(new App\Events\NotificationEvent());
    return "event fired";
});

Route::get('test', function () {
    // this checks for the event
    return view('test');
});
