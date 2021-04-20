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
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    
    //Funciones para archivos
    Route::get('/files', 'User\FilesController@index')->name('user.files.index');
    Route::get('/files/{file}', 'User\FilesController@show')->name('user.files.show');
    Route::post('/upload', 'User\FilesController@store')->name('user.files.store');
    Route::delete('/delete-files/{file}', 'User\FilesController@destroy')->name('user.files.destroy');
    //Funciones para productos
    Route::get('/products', 'User\ProductsController@mostrar')->name('products.index');
    Route::get('/products/create', 'User\ProductsController@ircrear')->name('products.ircrear');
    Route::post('products', 'User\ProductsController@store')->name('products.store');
    Route::delete('products/{id}', 'User\ProductsController@destroy')->name('products.destroy');
    Route::get('/products/{id}/edit', 'User\ProductsController@showedit')->name('products.edit');
    Route::put('/products/{id}', 'User\ProductsController@update')->name('products.update');
});

Auth::routes();

//TODO: shapebootstrap.net/free-templates
//FIXME: esto se puede ver desde la paleta de comandos con list FIXME
