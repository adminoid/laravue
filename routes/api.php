<?php

use App\Http\Controllers\AdminArea\PageController;
use Illuminate\Http\Request;
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

//Route::get('children/{id?}', 'PageController@getList')->where('id', '[0-9]+');
Route::post('pages/move', 'PageController@move');
Route::resource('pages', PageController::class);
