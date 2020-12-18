<?php 

Route::middleware('auth')->group(function ()
{

	Route::get('/logout', 'AuthController@logout')->name('logout');

	Route::prefix('email')->middleware('not-verified')->name('verification.')->group(function ()
	{
		Route::view('/verify', 'auth.verify')->name('notice');
		Route::get('/verify/{id}/{hash}', 'AuthController@verify')->name('verify')->middleware('signed');
	});

	Route::middleware('verified')->namespace('User')->prefix('user')->name('user.')->group(function ()
	{
		Route::get('/', 'HomeController@index')->name('index');
		Route::view('/profile', 'user.profile')->name('profile');

		Route::post('/category/search', 'CategoryController@search')->name('category.search');

		Route::prefix('saved')->name('saved.')->group(function ()
		{
			Route::view('/', 'user.saved')->name('index');
			Route::delete('/{id}/destroy')->name('destroy');
		});

		Route::resource('/files', 'FilesController');
	});

});

Route::middleware('guest')->group(function ()
{
	Route::view('/login', 'auth.login');
	Route::post('/login', 'AuthController@login')->name('login');
	Route::view('/register', 'auth.register');
	Route::post('/register', 'AuthController@register')->name('register');
})

 ?>