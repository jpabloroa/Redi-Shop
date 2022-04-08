<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user', function (Request $request) {
    return '- '.Auth::hasUser();
});

Route::post('/location-testing', function (Request $request) {
    $position = $request->position;
    $meta = new \App\Http\Tools\MetaData();
    $obj = $meta->getFormattedLocation($position['latitude'], $position['longitude']);
    return $obj['formatted'];
});
