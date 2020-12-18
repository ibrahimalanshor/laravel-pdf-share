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

require base_path('routes/user.php');
require base_path('routes/admin.php');

Route::middleware('visitor')->group(function ()
{

	Route::view('/', 'home')->name('home');
	Route::view('/search', 'home')->name('search');
	Route::get('/user/{id}', 'HomeController@user')->name('user');
	Route::get('/{slug}', 'HomeController@detail')->name('detail');
	Route::get('/{slug}/download', 'HomeController@download')->name('download');
	Route::get('/{slug}/save', 'HomeController@save')->name('save');

});
