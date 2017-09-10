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
Route::get('/cars', 'CarController@index');
Route::get('/cars/{cid}', 'CarController@detail');
Route::get('/how-it-works', function () {
    return view('how-it-works');
});
Route::get('/contact-us', 'ContactUsController@index');
Route::post('/contact-us', 'ContactUsController@create');
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
Route::get('/history', 'BookingController@history');

Route::post('/register-newsletter', 'NewsletterController@register');