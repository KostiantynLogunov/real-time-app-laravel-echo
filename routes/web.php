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
    return view('chat');
});

/*Route::post('messages', function (\Illuminate\Http\Request $request) {
    \App\Events\Message::dispatch($request->input('body'));
});*/

Route::post('messages', function (\Illuminate\Http\Request $request) {
    \App\Events\PrivateChat::dispatch($request->all());
});

Route::get('/room/{room}', function (\App\Room $room) {
    return view('room', ['room' => $room]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
