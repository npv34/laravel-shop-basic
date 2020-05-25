<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','LoginController@showFormLogin');
Route::post('/login','LoginController@login')->name('login');

Route::prefix('users')->group(function (){
    Route::get('/','UserController@getAll')->name('users.list');
    Route::get('/{id}/delete','UserController@delete')->name('users.delete');
    Route::get('/{id}/change-password','UserController@showFormChangePassword')->name('users.showFormChangePassword');
    Route::post('/{id}/change-password','UserController@changePassword')->name('users.changePassword');
});

Route::prefix('categories')->group(function (){
    Route::get('/','CategoryController@getAll')->name('categories.list');
});
