<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
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
Route::get('/', function () {return view('admin/pages/dashboard');})->name('dashboard');
Route::get('/users', function () {return view('admin/pages/users');})->name('users');

//retrieve from database
//route link    controller name / function
Route::get('/userAccount',[users::class,'accountList']);