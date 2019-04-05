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

Route::get('/login-via/{site}', 'Social\DefaultController@redirectToProvider');
Route::get('/login-via/{site}/callback', 'Social\DefaultController@handleProviderCallback');

Auth::routes();


Route::middleware('auth')->group(function(){
    include('survey.php');
    Route::get('/', 'Dashboard\DefaultController@index');
    Route::prefix('dashboard')->group(function(){
      Route::get('/', 'Dashboard\DefaultController@index');

      include('profile.php');
      include('user.php');
      include('roles.php');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
