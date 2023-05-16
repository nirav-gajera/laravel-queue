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
use App\Jobs\SendWelcomeEmailJob;

Route::get('/test', function () {
    $details['name'] = 'nirav';
    $details['email'] = 'nirav.demo@gmail.com';

    dispatch(new SendWelcomeEmailJob($details));
    dd('sent');
});

Route::get('/', function () {
    return view('welcome');
});
