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
Route::get('products/search', function (){
    return view('productsAPI.search');
});
Route::post('/products/search', 'ProductsAPIController@search');
Route::resource('products', 'ProductsAPIController');


Route::resource('categories', 'CategoriesAPIController');
Route::resource('clients', 'ClientsAPIController');
Route::resource('admins', 'AdminAPIController');





