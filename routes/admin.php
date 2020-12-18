<?php 

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function ()
{
	
	Route::middleware('auth:admin')->group(function ()
	{
		Route::get('/', 'HomeController@index')->name('index');
		Route::get('/logout', 'AuthController@logout')->name('logout');

		Route::prefix('files')->name('files.')->group(function ()
		{
			Route::view('/', 'admin.files')->name('index');
			Route::post('/datatables', 'FileController@datatables')->name('datatables');
			Route::delete('/{id}', 'FileController@destroy')->name('destroy');
		});

		Route::prefix('users')->name('users.')->group(function ()
		{
			Route::view('/', 'admin.users')->name('index');
			Route::post('/datatables', 'UserController@datatables')->name('datatables');
			Route::delete('/{id}', 'UserController@destroy')->name('destroy');
		});

		Route::view('setting', 'admin.setting')->name('setting');
	});

	Route::middleware('guest:admin')->group(function ()
	{
		Route::view('/login', 'admin.login');
		Route::post('/login', 'AuthController@login')->name('login');
	});


});

 ?>