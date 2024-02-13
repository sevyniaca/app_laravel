<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\pages;
use App\Http\Middleware\sessionMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//page view

//link -> blade file directory - > route name (optional)
Route::get('/', [pages::class,'loginPage'])->name('login');

Route::get('/dashboard', [pages::class,'adminDashboard'])->name('dashboard');

Route::get('/users',[pages::class,'admidUsers'] )->name('users');

Route::get('/logout',[users::class,'logout'])->name('logout');


//get data from database
Route::get('/userAccount',[users::class,'accountList']);
Route::get('/selectAccount',[users::class,'selectAccount']);


//form request
Route::post('/login',[users::class,'login']); 
Route::post('/createAccount',[users::class,'createAccount']);
Route::post('/editInfo',[users::class,'editInfo']);
Route::post('/editRole',[users::class,'editRole']);

//get request 
Route::get('/changeStatus',[users::class,'changeStatus']);