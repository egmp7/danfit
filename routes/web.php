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


// DELETE THIS
Route::get('/configuracion', 'PagesController@getConfig');

Auth::routes(['register' => false]);
Route::get('/dashboard', 'DashboardController@index');


Route::resource('config','ConfigController');

Route::resource('workout','WorkoutController');

Route::resource('test','DataController');



//  NOT AUTH

Route::get('/', function () {
    return redirect('/login') ;
});
