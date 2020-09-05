<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| All the admin routes lies here
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LogoutController@logout');




//Author Routes
Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'Admin\DashboardController@index')->name('admin');

	Route::group(['prefix' => 'property'], function(){
		Route::get('/', 'Admin\PropertyController@index');
		Route::get('create', 'Admin\PropertyController@create');
		Route::post('store','Admin\PropertyController@store');
		Route::get('show/{id}', 'Admin\PropertyController@show');
		Route::get('edit/{id}', 'Admin\PropertyController@edit');
		Route::post('update', 'Admin\PropertyController@update');

		Route::get('destroy', 'Admin\PropertyController@destroyAll');
		Route::get('destroy/{id}', 'Admin\PropertyController@destroy');
		Route::get('trash', 'Admin\PropertyController@trash');
		Route::get('restore', 'Admin\PropertyController@restoreAll'); 
		Route::get('restore/{id}', 'Admin\PropertyController@restore'); 
		Route::get('clear/{id}', 'Admin\PropertyController@clear'); 
		Route::get('empty', 'Admin\PropertyController@empty');
	});

	Route::group(['prefix' => 'testimonial'], function(){
		Route::get('/', 'TestimonialController@index');
		Route::get('create', 'TestimonialController@create');
		Route::post('store','TestimonialController@store');
		Route::get('show/{id}', 'TestimonialController@show');
		Route::get('edit/{id}', 'TestimonialController@edit');
		Route::post('update', 'TestimonialController@update');

		Route::get('destroy', 'TestimonialController@destroyAll');
		Route::get('destroy/{id}', 'TestimonialController@destroy');
		Route::get('trash', 'TestimonialController@trash');
		Route::get('restore', 'TestimonialController@restoreAll'); 
		Route::get('restore/{id}', 'TestimonialController@restore'); 
		Route::get('clear/{id}', 'TestimonialController@clear'); 
		Route::get('empty', 'TestimonialController@empty');
	});
});





/*
|--------------------------------------------------------------------------
| Web site general routes
|--------------------------------------------------------------------------
|
| Here is all the routes that the visitor visit from website 
|
*/
Route::get('/', 'HomeController@index');
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


