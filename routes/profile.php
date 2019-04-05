<?php
Route::prefix('profile')->group(function(){
    Route::get('/', 'Dashboard\ProfileController@index');

    Route::prefix('update')->group(function(){
      Route::post('/', 'Dashboard\ProfileController@update');
      Route::post('/password', 'Dashboard\ProfileController@update');
      Route::post('/basic-profile', 'Dashboard\ProfileController@update');
      Route::post('/avatar','Dashboard\ProfileController@update');
      Route::post('/cover','Dashboard\ProfileController@update');
    });

    Route::get('/{type}/{id}/delete','Dashboard\ProfileController@remove');
    Route::get('/{type}/upload','Dashboard\ProfileController@imageUpload');

});
