<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', 'App\Http\Controllers\ClientController@home');
Route::get('/apropos', 'App\Http\Controllers\ClientController@about');
Route::get('/contact', 'App\Http\Controllers\ClientController@contact');
Route::get('/shop', 'App\Http\Controllers\ClientController@shop');
Route::get('/panier', 'App\Http\Controllers\ClientController@cart');
Route::get('/connexion', 'App\Http\Controllers\ClientController@client_login');
Route::get('/deconnexion', 'App\Http\Controllers\ClientController@client_signup');

Route::get('/admin', 'App\Http\Controllers\AdminController@dashboard');

Route::get('/addcategory', 'App\Http\Controllers\CategoryController@addcategory');
Route::post('/savecategory', 'App\Http\Controllers\CategoryController@savecategory');
Route::get('/categories', 'App\Http\Controllers\CategoryController@categories');
Route::get('/editcategory/{id}' , 'App\Http\Controllers\CategoryController@editcategory');
Route::post('/updatecategory' , 'App\Http\Controllers\CategoryController@updatecategory');
Route::get('/deletecategory/{id}' , 'App\Http\Controllers\CategoryController@deletecategory');

Route::get('/addproduct', 'App\Http\Controllers\ProductController@addproduct');
Route::post('/saveproduct', 'App\Http\Controllers\ProductController@saveproduct');
Route::get('/products', 'App\Http\Controllers\ProductController@products');

Route::get('/addslider', 'App\Http\Controllers\SliderController@addslider');
Route::post('/saveslider', 'App\Http\Controllers\SliderController@saveslider');
Route::get('/sliders', 'App\Http\Controllers\SliderController@sliders');
