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




Auth::routes(['register' => false]);


Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/{id}', 'DashboardController@view');

// DELETE THIS
Route::resource('config','ConfigController');
Route::resource('workout','WorkoutController');
Route::get('/configuracion', 'PagesController@getConfig');



//  NOT AUTH

Route::get('/', function () {
    return redirect('/login') ;
});
