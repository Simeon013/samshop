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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/', 'App\Http\Controllers\ClientController@home')->name('home');
Route::get('/apropos', 'App\Http\Controllers\ClientController@about')->name('about');
Route::get('/contact', 'App\Http\Controllers\ClientController@contact')->name('contact');
Route::get('/shop', 'App\Http\Controllers\ClientController@shop')->name('shop');
Route::get('/panier', 'App\Http\Controllers\ClientController@cart')->name('cart');
Route::get('/historique', 'App\Http\Controllers\ClientController@history')->name('history');
Route::get('/paiement', 'App\Http\Controllers\ClientController@checkout')->name('checkout');
Route::post('/payer', 'App\Http\Controllers\ClientController@buy')->name('buy');
Route::get('/ajouter_au_panier/{id}','App\Http\Controllers\ClientController@add_to_cart')->name('add_to_cart');
Route::get('/modifier_qty/{id} ', 'App\Http\Controllers\ClientController@update_cart');
Route::get('/retirer_produit/{id}', 'App\Http\Controllers\ClientController@remove_to_cart')->name('remove_to_cart');

Route::get('/voir_pdf/{id}', 'App\Http\Controllers\PdfController@voir_pdf')->name('voir_pdf');

Route::get('/admin', 'App\Http\Controllers\AdminController@dashboard')->name('admin');
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');

Route::get('/admin/categories', 'App\Http\Controllers\CategoryController@categories')->name('categories');
Route::get('/admin/categories/addcategory', 'App\Http\Controllers\CategoryController@addcategory')->name('addcategory');
Route::post('/admin/categories/savecategory', 'App\Http\Controllers\CategoryController@savecategory')->name('savecategory');
Route::get('/admin/categories/editcategory/{id}' , 'App\Http\Controllers\CategoryController@editcategory')->name('editcategory');
Route::post('/admin/categories/updatecategory' , 'App\Http\Controllers\CategoryController@updatecategory')->name('updatecategory');
Route::get('/admin/categories/deletecategory/{id}' , 'App\Http\Controllers\CategoryController@deletecategory')->name('deletecategory');

Route::get('/admin/products' , 'App\Http\Controllers\ProductController@products')->name('products');
Route::get('/admin/products/addproduct' , 'App\Http\Controllers\ProductController@addproduct')->name('addproduct');
Route::post('/admin/products/saveproduct' , 'App\Http\Controllers\ProductController@saveproduct')->name('saveproduct');
Route::get('/admin/products/editproduct/{id}' , 'App\Http\Controllers\ProductController@editproduct')->name('editproduct');
Route::post('/admin/products/updateproduct' , 'App\Http\Controllers\ProductController@updateproduct')->name('updateproduct');
Route::get('/admin/products/deleteproduct/{id}' , 'App\Http\Controllers\ProductController@deleteproduct')->name('deleteproduct');
Route::get('/admin/products/activerproduct/{id}' , 'App\Http\Controllers\ProductController@activerproduct')->name('activerproduct');
Route::get('/admin/products/desactiverproduct/{id}' , 'App\Http\Controllers\ProductController@desactiverproduct')->name('desactiverproduct');

Route::get('/admin/sliders' , 'App\Http\Controllers\SliderController@sliders')->name('sliders');
Route::get('/admin/sliders/addslider' , 'App\Http\Controllers\SliderController@addslider')->name('addslider');
Route::post('/admin/sliders/saveslider' , 'App\Http\Controllers\SliderController@saveslider')->name('saveslider');
Route::get('/admin/sliders/editslider/{id}' , 'App\Http\Controllers\SliderController@editslider')->name('editslider');
Route::post('/admin/sliders/updateslider' , 'App\Http\Controllers\SliderController@updateslider')->name('updateslider');
Route::get('/admin/sliders/deleteslider/{id}' , 'App\Http\Controllers\SliderController@deleteslider')->name('deleteslider');
Route::get('/admin/sliders/activerslider/{id}' , 'App\Http\Controllers\SliderController@activerslider')->name('activerslider');
Route::get('/admin/sliders/desactiverslider/{id}' , 'App\Http\Controllers\SliderController@desactiverslider')->name('desactiverslider');



require __DIR__.'/auth.php';
