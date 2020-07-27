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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////////////////////////////////////////////Testing-can be deleted/////////////////////////
Route::get('products', 'ProductController@index')->name('products.index');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::post('products', 'ProductController@store')->name('products.store');

Route::get('products/{product}','ProductController@show')->name('product.show');

Route::get('products/{product}/edit','ProductController@edit')->name('product.edit');

Route::match(['put', 'patch'], 'products/{product}','ProductController@update')->name('product.update');

Route::delete('products/{product}', 'ProductController@destroy')->name('product.destroy');
///////////////////////////////////////////////////////////////////////////////////////////////////////