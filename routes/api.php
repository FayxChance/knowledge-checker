<?php

use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Section;

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



Route::get('sections', 'App\Http\Controllers\SectionController@index');
Route::get('sections/{id}', 'App\Http\Controllers\SectionController@show');
Route::post('sections', 'App\Http\Controllers\SectionController@store');
Route::put('sections/{id}', 'App\Http\Controllers\SectionController@update');
Route::delete('sections/{id}', 'App\Http\Controllers\SectionController@delete');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
