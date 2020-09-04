<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });

Route::group(['prefix' => 'services'], function(){
	Route::group(['prefix' => 'rental'], function(){
		Route::get('/residential', function () { return view('services.rental.residential'); });
		Route::get('/commercial', function () { return view('services.rental.commercial'); });
		Route::get('/industrial', function () { return view('services.rental.industrial'); });
	});

	Route::group(['prefix' => 'support'], function(){
		Route::get('/general', function () { return view('services.support.general'); });
		Route::get('/handyman', function () { return view('services.support.handyman'); });
		Route::get('/moving', function () { return view('services.support.moving'); });
		Route::get('/immigration', function () { return view('services.support.immigration'); });
		Route::get('/car', function () { return view('services.support.car'); });
		Route::get('/food', function () { return view('services.support.food'); });
		Route::get('/concierge', function () { return view('services.support.concierge'); });
		Route::get('/travel', function () { return view('services.support.travel'); });
		Route::get('/event', function () { return view('services.support.event'); });
	});

	Route::group(['prefix' => 'others'], function(){
		Route::get('/cleaning', function () { return view('services.others.cleaning'); });
		Route::get('/tattoo', function () { return view('services.others.tattoo'); });
		Route::get('/buyandsell', function () { return view('services.others.buyandsell'); });
	});
});

Route::group(['prefix' => 'apartments'], function(){
	Route::get('/furnished', function () { return view('apartments.furnished'); });
	Route::get('/unfurnished', function () { return view('apartments.unfurnished'); });
	Route::get('/semifurnished', function () { return view('apartments.semifurnished'); });
	Route::get('/serviced', function () { return view('apartments.serviced'); });
});


