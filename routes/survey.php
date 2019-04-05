<?php
Route::prefix('take-survey')->group(function(){
    Route::get('/', 'Survey\DefaultController@index');
    Route::post('/', 'Survey\DefaultController@store');
});
