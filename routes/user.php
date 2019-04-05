<?php
Route::prefix('users')->group(function(){
  Route::get('/', 'Dashboard\UserController@index');
  Route::get('/create', 'Dashboard\UserController@show');
  Route::get('{id}/edit', 'Dashboard\UserController@show');
  Route::get('{id}/{typr}/upload', 'Dashboard\UserController@imageUpload');
  Route::get('{id}/delete', 'Dashboard\UserController@delete');

  Route::get('{id}/login-as', 'Dashboard\UserController@loginAs');


  Route::prefix('update')->group(function(){
    Route::post('/', 'Dashboard\UserController@save');
    Route::post('/password', 'Dashboard\UserController@save');
    Route::post('/basic-profile', 'Dashboard\UserController@save');
    Route::post('/avatar','Dashboard\UserController@save');
    Route::post('/cover','Dashboard\UserController@save');
  });
});
