<?php

use Illuminate\Http\Request;

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

Route::get('get-details-operator','API\OperatorController@index');
Route::post('add-operator','API\OperatorController@addOperator');

Route::get('get-details-subscriber','API\SubscriberController@index');
Route::post('add-subscriber','API\SubscriberController@addSubscriber');


