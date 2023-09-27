<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Authcontroller;

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
Route::get('/about_us', [usercontroller::class, "about_us"])->name('about_us');
Route::get('/accordion', [usercontroller::class, "accordion"])->name('accordion');
Route::get('/blog_details', [usercontroller::class, "blog_details"])->name('blog_details');
Route::get('/blog', [usercontroller::class, "blog"])->name('blog');
Route::get('/category', [usercontroller::class, "category"])->name('category');
Route::get('/checkout', [usercontroller::class, "checkout"])->name('checkout');
Route::get('/contact', [usercontroller::class, "contact"])->name('contact');
Route::get('/error', [usercontroller::class, "error"])->name('error');
Route::get('/faq', [usercontroller::class, "faq"])->name('faq');
Route::get('/gift_card', [usercontroller::class, "gift_card"])->name('gift_card');
Route::get('/myaccount', [usercontroller::class, "myaccount"])->name('myaccount');
Route::get('/our_brand', [usercontroller::class, "our_brand"])->name('our_brand');
Route::get('/quick_view', [usercontroller::class, "quick_view"])->name('quick_view');
Route::get('/slider', [usercontroller::class, "slider"])->name('slider');
Route::get('/standard', [usercontroller::class, "standard"])->name('standard');
Route::get('/wishlist', [usercontroller::class, "wishlist"])->name('wishlist');
Route::get('/cart', [usercontroller::class, "cart"])->name('cart');
Route::get('/login', [usercontroller::class, "login"])->name('admin.login.view');
Route::get('/registration', [usercontroller::class, "registration"])->name('registration');
Route::get('/Auth_register', [usercontroller::class, "Auth_register"])->name('Auth_register');
Route::get('/Auth_login',[usercontroller::class, "Auth_login"])->name('Auth_login');



Route::middleware('admin')->group(function(){
    
    Route::get('/dashboard', [usercontroller::class, "dashboard"])->name('dashboard');
    
});


