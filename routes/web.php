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
    return view('home');
});
Route::get('/brands', function () {
    return view('car-brands');
});
Route::get('/cars', function () {
    return view('car-collections');
});
Route::get('/cars/{cid}', function () {
    return view('car-details');
});
Route::get('/how-it-works', function () {
    return view('how-it-works');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/dashboard', 'ProfileController@dashboard');
Route::get('/profile', 'ProfileController@show');
Route::get('/profile/edit', 'ProfileController@edit');
Route::put('/profile/edit', 'ProfileController@update')->name('profile.submit');
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

Route::get('/cars/book/{cid}', 'BookingController@show');