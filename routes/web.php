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

/*
|--------------------------------------------------------------------------
| Route Login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login');
});
// prosess login
Route::post('/login', 'LoginController@loginProses');
Route::get('/logout', 'LoginController@logout');


Route::group(['middleware' => 'CekLoginMiddleware'],function(){
    /*
    |--------------------------------------------------------------------------
    | Route User
    |--------------------------------------------------------------------------
    */
    // tampil user
    Route::get('user', 'UserController@data')->middleware('CekLoginMiddleware');
    // add user form
    Route::get('user/add', 'UserController@add');
    // add user proses
    Route::post('user', 'UserController@addUser');
    // edit user form modal
    Route::post('user/edit', 'UserController@editUserModal');
    // edit user form classic (NORMAL WAY)
    Route::get('user/edit/{id}', 'UserController@editUser');
    // edit user proses
    Route::patch('user/{id}', 'UserController@editProses');
    // delete user proses
    Route::get('user/delete/{id}', 'UserController@deleteUser');
    /*
    |--------------------------------------------------------------------------
    | Route Dashboard
    |--------------------------------------------------------------------------
    */
    // dashboard
    Route::get('/dashboard', function () {
        return view('home');
    });
});

