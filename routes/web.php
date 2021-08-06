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
Auth::routes();

Route::get('/', function () {
    return redirect('/products/index');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/products/index','ProductController@index')->middleware('auth');
Route::get('/product/edit/{id}','ProductController@edit');
});



Route::get('/create', function () {
    return view('product.add');
});
// product routes
Route::middleware(['auth'])->group(function () {
    Route::post('/add','ProductController@add_product')->name('add.product');
Route::post('/edit/{id}','ProductController@edit_product');
Route::get('/delete/{id}','ProductController@destroy');
Route::get('/show/{id}','ProductController@show');
});


//shipment routes
Route::middleware(['auth'])->group(function () {
    Route::get('/shipment/index','ShipmentController@index');
Route::get('/{status}','ShipmentController@status_index');
Route::post('/create','ShipmentController@add_shipment')->name('add.shipment');
Route::get('/shipment/create','ShipmentController@index_create');
Route::get('/shipment/show/{id}','ShipmentController@show');
Route::get('/shipment/delete/{id}','ShipmentController@destroy');
Route::get('/shipment/edit/{id}','ShipmentController@edit');
Route::post('/ship/edit/{id}','ShipmentController@edit_shipment');
});



//stock routes
Route::middleware(['auth'])->group(function () {
    Route::get('/stock/index','StockController@index');
Route::get('/stocks/export', 'StockController@export');
Route::post('/stocks/import', 'StockController@import');
});



Route::get('/home', 'HomeController@index')->name('home');
