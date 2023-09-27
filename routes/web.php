<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
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
Route::get('/adminlogout', [Authcontroller::class, "admin_logout"])->name('admin.logout');
Route::Post('/login_auth', [Authcontroller::class, "login"])->name('auth.login');
Route::get('/registration', [usercontroller::class, "registration"])->name('registration');
Route::get('/Auth_register', [usercontroller::class, "Auth_register"])->name('Auth_register');
Route::get('/admin/login',[usercontroller::class, "Auth_login"])->name('Auth_login');



Route::middleware('admin')->group(function(){

    Route::get('/dashboard', [DashboardController::class, "index"])->name('admin.dashboard');

    //Category Route
    Route::prefix('/category')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('category.index');
        Route::get('/create' , [CategoryController::class , 'create'])->name('category.create');
        Route::get('/trash' , [CategoryController::class , 'trash'])->name('category.trash');
        Route::get('/edit/{id?}' , [CategoryController::class , 'edit'])->name('category.edit');
        Route::get('/delete/{id?}' , [CategoryController::class , 'delete'])->name('category.delete');
        Route::get('/restore/{id?}' , [CategoryController::class , 'restore'])->name('category.restore');
        Route::get('/destroy/{id?}' , [CategoryController::class , 'destroy'])->name('category.destroy');
        Route::Post('/store' , [CategoryController::class , 'store'])->name('category.store');
        Route::Post('/update/{id?}' , [CategoryController::class , 'update'])->name('category.update');
    });
    // Subcategory
    Route::prefix('/subcategory')->group(function(){
        Route::get('/' , [SubCategoryController::class , 'index'])->name('subcategory.index');
        Route::get('/create' , [SubCategoryController::class , 'create'])->name('subcategory.create');
        Route::get('/trash' , [SubCategoryController::class , 'trash'])->name('subcategory.trash');
        Route::get('/edit/{id?}' , [SubCategoryController::class , 'edit'])->name('subcategory.edit');
        Route::get('/delete/{id?}' , [SubCategoryController::class , 'delete'])->name('subcategory.delete');
        Route::get('/restore/{id?}' , [SubCategoryController::class , 'restore'])->name('subcategory.restore');
        Route::get('/destroy/{id?}' , [SubCategoryController::class , 'destroy'])->name('subcategory.destroy');
        Route::Post('/store' , [SubCategoryController::class , 'store'])->name('subcategory.store');
        Route::Post('/update/{id?}' , [SubCategoryController::class , 'update'])->name('subcategory.update');
    });

});


