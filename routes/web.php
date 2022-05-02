<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorialesController;

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
    Route::get('/editoriales/index','index');
    Route::get('/editoriales/create','create');
    Route::get('/editoriales/edit/{id}','edit');
});
