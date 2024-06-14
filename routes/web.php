<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/customer', 'CustomerController@index');

Route::get('/showTableCustomer', 'CustomerController@showCustomers');

Route::post('/addCustomer', 'CustomerController@addCustomer');



Route::get('/user', 'UserController@index');

Route::get('/showTableUser', 'UserController@showUsers');

Route::post('/addUser', 'UserController@addUser');

Route::get('/showEdit/{id}', 'UserController@showEdit');

Route::post('/edit/{id}', 'UserController@edit');

Route::post('/delete/{id}', 'UserController@delete');





Route::get('/login', 'LoginController@index');

Route::post('/login', 'LoginController@login');

Route::post('/logout', 'LogoutController@logout');





