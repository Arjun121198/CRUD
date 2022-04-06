<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [CustomerController::class, 'home']);
Route::post('/customeradd', [CustomerController::class, 'customerAdd']);
Route::get('/delete', [CustomerController::class, 'delete']);
Route::post('/customerupdate', [CustomerController::class, 'customerUpdate']);
Route::post('/customerdelete', [CustomerController::class, 'customerDelete']);
Route::post('/find', [CustomerController::class, 'find']);
Route::get('/input', [CustomerController::class, 'input']);
Route::get('/new', [CustomerController::class, 'new']);
Route::post('/addnew', [CustomerController::class, 'addNew']);
Route::post('/show', [CustomerController::class, 'show']);

