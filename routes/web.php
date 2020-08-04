<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/','MainController@index')->name('main');
Route::resource('products.carts', 'ProductCartController')->only(['store','destroy']);

Route::resource('carts', 'CartController')->only(['index']);

Route::resource('orders', 'OrderController')->only(['create','store']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create','store']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

//**All the following routes were replaced by Route::resource('products', 'ProductController');

// Route::get('products', 'ProductController@index')->name('products.index');

// Route::get('products/create', 'ProductController@create')->name('products.create');

// Route::post('products', 'ProductController@store')->name('products.store');

// Route::get('products/{product}','ProductController@show')->name('products.show');
// // Route::get('products/{product:title}','ProductController@show')->name('product.show');-> This is the same as the show route except instead of and ID its requires a title

// Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}','ProductController@update')->name('products.update');

// Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
///////////////////////////////////////////////////////////////////////////////////////////////////////