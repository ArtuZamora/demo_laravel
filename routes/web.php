<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorialesController;
use App\Http\Controllers\AutorController;

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
Route::get('/{controller}/{action}', function ($controller, $action = "index") {

});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hola Mundo';
});

Route::get('/hello/en', function () {
    return 'Hello World';
});

Route::get('/hello/{name}', function ($name) {
    return 'Hola '.$name;
});

//Route::get('/editoriales/index', [EditorialesController::class,'index']);
//Route::get('/editoriales/create', [EditorialesController::class,'create']);
//Route::get('/editoriales/edit', [EditorialesController::class,'edit']);

Route::controller(EditorialesController::class)->group(function () {
    Route::get('/editoriales/index','index')->name('editoriales.index');;
    Route::get('/editoriales/create','create')->name('editoriales.create');
    Route::post('/editoriales','store')->name('editoriales.store');
    Route::get('/editoriales/edit/{id}','edit')->name('editoriales.edit');
    Route::post('/editoriales/{id}','update')->name('editoriales.update');
    Route::get('/editoriales/destroy/{id}','destroy')->name('editoriales.destroy');
});
Route::controller(AutorController::class)->group(function () {
    Route::get('/autores/index','index')->name('autores.index');;
    Route::get('/autores/create','create')->name('autores.create');
    Route::post('/autores','store')->name('autores.store');
    Route::get('/autores/edit/{id}','edit')->name('autores.edit');
    Route::post('/autores/{id}','update')->name('autores.update');
    Route::get('/autores/destroy/{id}','destroy')->name('autores.destroy');
});