<?php

use Illuminate\Http\Request;
use App\Http\Resources\Data as DataResource;

use App\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user_data','DataController@index');

Route::post('user_data','DataController@store');

Route::get('workouts','DataController@dataWorkouts');

