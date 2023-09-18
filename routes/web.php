<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

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

Route::get('/', [usercontroller::class, "index"]);
Route::get('/aboutus', [usercontroller::class, "about-us"]);
Route::get('/accordion', [usercontroller::class, "accordion"]);
Route::get('/blog', [usercontroller::class, "blog-details"]);