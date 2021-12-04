<?php

use App\Http\Controllers\Home\EsController;
use App\Http\Controllers\Home\HomeController;
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
Route::get('/greeting', function () {
    return 'Hello World';
});
Route::get('/home/index', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search']);
Route::get('/home/get', [HomeController::class, 'get']);
Route::get('/home/update', [HomeController::class, 'update']);
Route::get('/home/delete', [HomeController::class, 'delete']);


Route::get('/es/test', [EsController::class, 'test']);
Route::get('/es/search', [EsController::class, 'get']);
Route::get('/es/delete', [EsController::class, 'delete']);

