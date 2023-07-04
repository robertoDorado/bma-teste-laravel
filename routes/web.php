<?php

use App\Http\Controllers\Crud;
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

Route::get('/', [Crud::class, 'index']);
Route::get('/novo-usuario', [Crud::class, 'create']);
Route::post('/novo-usuario', [Crud::class, 'create']);

Route::get('/editar-usuario', [Crud::class, 'update']);
Route::post('/editar-usuario', [Crud::class, 'update']);

Route::post('/excluir-usuario', [Crud::class, 'destroy']);