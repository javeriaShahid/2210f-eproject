<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\User\Cartcontroller;
use App\Http\Controllers\User\Checkoutcontroller;
use App\Http\Controllers\User\HomeController;

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

Route::get('/', [HomeController::class, "index"])->name('user.index');
Route::get('/about_us', [usercontroller::class, "about_us"])->name('about_us');
Route::get('/accordion', [usercontroller::class, "accordion"])->name('accordion');
Route::get('/blog_details', [usercontroller::class, "blog_details"])->name('blog_details');
Route::get('/blog', [usercontroller::class, "blog"])->name('blog');
Route::get('/category', [usercontroller::class, "category"])->name('category');
Route::get('/contact', [usercontroller::class, "contact"])->name('contact');
Route::get('/error', [usercontroller::class, "error"])->name('error');
Route::get('/faq', [usercontroller::class, "faq"])->name('faq');
Route::get('/gift_card', [usercontroller::class, "gift_card"])->name('gift_card');
Route::get('/myaccount', [Authcontroller::class, "edit_user"])->name('myaccount');
Route::get('/state_city/{id?}' , [Authcontroller::class , 'get_state_and_city'])->name("get.state.city");   
Route::get('/our_brand', [usercontroller::class, "our_brand"])->name('our_brand');
Route::get('/quick_view', [usercontroller::class, "quick_view"])->name('quick_view');
Route::get('/slider', [usercontroller::class, "slider"])->name('slider');
Route::get('/standard', [usercontroller::class, "standard"])->name('standard');
Route::get('/wishlist', [usercontroller::class, "wishlist"])->name('wishlist');
Route::get('/cart', [Cartcontroller::class, "index"])->name('cart');
Route::get('/login', [usercontroller::class, "login"])->name('login.view');
Route::get('/adminlogout', [Authcontroller::class, "admin_logout"])->name('admin.logout');
Route::Post('/login_auth', [Authcontroller::class, "login"])->name('auth.login');
Route::get('/registration', [usercontroller::class, "registration"])->name('registration');
Route::get('/Auth_register', [usercontroller::class, "Auth_register"])->name('Auth_register');
Route::get('/admin/login',[usercontroller::class, "Auth_login"])->name('Auth_login');
Route::get('/user/logout',[Authcontroller::class, "user_logout"])->name('user.logout');

Route::post('/user/register',[Authcontroller::class, "registeration"])->name('user.register.post');
Route::get('/Account_setting',[usercontroller::class, "Account_setting"])->name('Account_setting');
Route::get('loadPdf/{id?}' , [PDFController::class,'generatePdf'])->name('generate.label');
Route::post('/update/profile/{id?}' , [Authcontroller::class , 'update'])->name('profile.update');
// User Routes For Cart and checkout
Route::get('cartError' , [Cartcontroller::class , 'cart_error'])->name('cart.error');
Route::middleware('user')->group(function(){
Route::get('/checkout', [Checkoutcontroller::class, "index"])->name('checkout');

Route::get('/addTocart/{id?}' , [Cartcontroller::class , 'store'])->name('cart.store');
Route::get('/deleteCart/{id?}' , [Cartcontroller::class ,'delete'])->name('cart.delete');
Route::get('/addQuantity/{id?}' , [Cartcontroller::class , 'increment'])->name('cart.plus');
Route::get('/minusQuantity/{id?}' , [Cartcontroller::class , 'decrement'])->name('cart.minus');
});

// End of user routes

Route::prefix('admin')->middleware('admin')->group(function(){

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
    // Product Routes
    Route::prefix('/product')->group(function(){
        Route::get('/' , [ProductController::class , 'index'])->name('product.index');
        Route::get('/published' , [ProductController::class , 'published'])->name('product.published');
        Route::get('/unpublished' , [ProductController::class , 'unpublished'])->name('product.unpublished');
        Route::get('/create' , [ProductController::class , 'create'])->name('product.create');
        Route::get('/trash' , [ProductController::class , 'trash'])->name('product.trash');
        Route::get('/edit/{id?}' , [ProductController::class , 'edit'])->name('product.edit');
        Route::get('/getsubcategory/{id?}' , [ProductController::class , 'getSubcategory'])->name('product.subcategory');
        Route::get('/delete/{id?}' , [ProductController::class , 'delete'])->name('product.delete');
        Route::get('/restore/{id?}' , [ProductController::class , 'restore'])->name('product.restore');
        Route::get('/destroy/{id?}' , [ProductController::class , 'destroy'])->name('product.destroy');
        Route::Post('/store' , [ProductController::class , 'store'])->name('product.store');
        Route::Post('/update/{id?}' , [ProductController::class , 'update'])->name('product.update');
        Route::get('/published_product/{id?}' , [ProductController::class , 'published_product'])->name('product.published.done');
        Route::get('/add_discount/{id?}', [ProductController::class,'discount'])->name('view.discount');
        Route::post('/add_sales/{id?}', [ProductController::class,'sale_price'])->name('add.discount');
        Route::get('/remove_discount/{id?}' , [ProductController::class , 'remove_discount'])->name('product.removediscount');
    });
    Route::prefix('/subimages')->group(function(){
        Route::get('/{id?}' , [ProductImageController::class , 'index'])->name('subimage.index');
        Route::get('/edit/{id?}' , [ProductImageController::class , 'edit'])->name('subimage.edit');
        Route::get('/create/{id?}' , [ProductImageController::class , 'create'])->name('subimage.create');
        Route::post('/update/{id?}' , [ProductImageController::class , 'update'])->name('subimage.update');
        Route::post('/store/{id?}' , [ProductImageController::class , 'store'])->name('subimage.store');
        Route::get('/trash/{id?}' , [ProductImageController::class , 'trash'])->name('subimage.trash');
        Route::get('/restore/{id?}' , [ProductImageController::class , 'restore'])->name('subimage.restore');
        Route::get('/delete/{id?}' , [ProductImageController::class , 'delete'])->name('subimage.delete');
        Route::get('/destroy/{id?}' , [ProductImageController::class , 'destroy'])->name('subimage.destroy');

    });
    // Brands
    Route::prefix('/brands')->group(function(){
        Route::get('/' , [BrandController::class , 'index'])->name('brand.index');
        Route::get('/edit/{id?}' , [BrandController::class , 'edit'])->name('brand.edit');
        Route::get('/create' , [BrandController::class , 'create'])->name('brand.create');
        Route::post('/update/{id?}' , [BrandController::class , 'update'])->name('brand.update');
        Route::post('/store' , [BrandController::class , 'store'])->name('brand.store');
        Route::get('/trash' , [BrandController::class , 'trash'])->name('brand.trash');
        Route::get('/restore/{id?}' , [BrandController::class , 'restore'])->name('brand.restore');
        Route::get('/delete/{id?}' , [BrandController::class , 'delete'])->name('brand.delete');
        Route::get('/destroy/{id?}' , [BrandController::class , 'destroy'])->name('brand.destroy');
    });
    // Users Managment
    Route::prefix('/user')->group(function(){
        Route::get('/' , [AdminUserController::class , 'index'])->name('admin.user.index');
        Route::get('/blocked' , [AdminUserController::class , 'blocked'])->name('admin.user.block');
        Route::get('/active' , [AdminUserController::class , 'active'])->name('admin.user.active');
        Route::get('/deactive' , [AdminUserController::class , 'deactive'])->name('admin.user.deactive');
        Route::get('/block/{id?}' , [AdminUserController::class , 'block_user'])->name('admin.user.blocked');
        Route::get('/unblock/{id?}' , [AdminUserController::class , 'unblock_user'])->name('admin.user.unblock');
        Route::get('/delete/{id?}' , [AdminUserController::class , 'delete'])->name('admin.user.delete');
    });
    // Admin Account Setting
    Route::prefix('account')->group(function(){
        Route::get('setting' , [Authcontroller::class , 'edit_admin'])->name('admin.account.setting');
    });


});


