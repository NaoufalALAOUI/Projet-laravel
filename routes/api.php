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

/* catégories */
Route::get('categories','CategorieController@index');
Route::post('categorie','CategorieController@store');
Route::get('categorie/{id}','CategorieController@show');
Route::patch('categorie/[id}','CategorieController@update');
Route::delete('categorie/{id}','CategorieController@destroy');

/* courses */
Route::get('courses','CourseController@index');
Route::post('course','CourseController@store');
Route::get('course/{id}','CourseController@show');
Route::patch('course/[id}','CourseController@update');
Route::delete('course/{id}','CourseController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
