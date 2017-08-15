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

/*Links on Header*/
Route::get('/', function () {
    return view('home');
});
Route::get('/brands', function () {
    return view('car-brands');
});
Route::get('/collections', function () {
    return view('car-collections');
});
Route::get('/how-it-works', function () {
    return view('how-it-works');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/profile', function () {
    return view('user-profile');
});

/*Links on footer*/
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});
Route::get('/about-us', function () {
    return view('about-us');
});