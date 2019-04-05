<?php
Route::group(['middleware' => ['role:admin']], function() {
  Route::prefix('roles')->group(function(){
    Route::get('/', 'Dashboard\RoleController@index');
    Route::get('/create', 'Dashboard\RoleController@form');
    Route::get('/{role_id}/edit', 'Dashboard\RoleController@form');
    Route::get('/{role_id}/delete', 'Dashboard\RoleController@delete');

    Route::post('/store', 'Dashboard\RoleController@store');
  });
});
