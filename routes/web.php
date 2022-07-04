<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ControlController;

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

Route::get('/', [ControlController::class, 'index']);
Route::get('contacts', [ContactController::class, 'index']);
Route::post('contacts/confirm', [ContactController::class, 'confirm']);
Route::post('contacts/thanks', [ContactController::class, 'thanks']);
Route::get('/delete/{id}', [ControlController::class, 'remove']);
Route::post('/delete/{id}', [ControlController::class, 'remove']);
