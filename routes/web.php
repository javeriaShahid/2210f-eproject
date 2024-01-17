<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PaymentGetwaySettingsController;
use App\Http\Controllers\Admin\AboutUsBannerController;
use App\Http\Controllers\Admin\DealsBannersController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\HomeLinkController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CategoryBannerController;
use App\Http\Controllers\User\BlogCommentController;
use App\Http\Controllers\User\FeedBackController;
use App\Http\Controllers\Admin\AdminFeedBackController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
// Getting Dynamic Route

// Email and Password Verifications
Route::post('/get_verification_code' , [ResetPasswordController::class , 'get_verification_code'])->name('get.verification.code');
Route::post('/verify_code' , [ResetPasswordController::class , 'verify_code'])->name('verify.code');
Route::post('/password_reset' , [ResetPasswordController::class , 'reset_password'])->name('password.reset');
// End Email And Password Verifications
Route::get('/', [HomeController::class, "index"])->name('user.index');
Route::get('/about_us', [UserController::class, "about_us"])->name('about_us');
Route::get('/search_category/{id?}', [UserController::class, "search_category"])->name('search.category');
Route::get('/subcategory_Search/{id?}', [UserController::class, "search_subcategory"])->name('search.subcategory');
Route::post('/search', [UserController::class, "search"])->name('search');
Route::get('/accordion/{id?}', [UserController::class, "accordion"])->name('accordion');
Route::get('/blog_details/{id?}', [UserController::class, "blog_details"])->name('blog_details');
Route::get('/blog_comments/{id?}', [UserController::class, "blog_comments"])->name('blog_comments');
Route::post('/add_comment', [BlogCommentController::class, "store"])->name('blog.add.comment');
Route::get('/blog', [UserController::class, "blog"])->name('blog');
Route::get('/blog_search/{id?}', [UserController::class, "blog_search"])->name('search.blog');
Route::get('/category', [UserController::class, "category"])->name('category');
Route::get('/contact', [UserController::class, "contact"])->name('contact');
Route::post('/storeContact', [ContactController::class, "store"])->name('store.contact');
Route::get('/error', [UserController::class, "error"])->name('error');
Route::get('/faq', [UserController::class, "faq"])->name('faq');
Route::get('/gift_card', [UserController::class, "gift_card"])->name('gift_card');
Route::get('/state_city/{id?}' , [Authcontroller::class , 'get_state_and_city'])->name("get.state.city");
Route::get('/our_brand', [UserController::class, "our_brand"])->name('our_brand');
Route::get('/quick_view', [UserController::class, "quick_view"])->name('quick_view');
Route::get('/slider', [UserController::class, "slider"])->name('slider');
Route::get('/standard', [UserController::class, "standard"])->name('standard');
Route::get('/wishlist', [UserController::class, "wishlist"])->name('wishlist');
Route::get('/cart', [Cartcontroller::class, "index"])->name('cart');
Route::get('/login', [UserController::class, "login"])->name('login.view');
Route::get('/adminlogout', [Authcontroller::class, "admin_logout"])->name('admin.logout');
Route::Post('/login_auth', [Authcontroller::class, "login"])->name('auth.login');
Route::get('/registration', [UserController::class, "registration"])->name('registration');
Route::get('/Auth_register', [UserController::class, "Auth_register"])->name('Auth_register');
Route::get('/admin/login',[UserController::class, "Auth_login"])->name('Auth_login');
Route::get('/user/logout',[Authcontroller::class, "user_logout"])->name('user.logout');
Route::get('/deactivate_account/{id?}' , [Authcontroller::class , 'remove_account'])->name('account.deactive');
Route::get('/verifyemail/{id?}' , [Authcontroller::class , 'verify_email_address'])->name('verify.email');
// States and City getting Routes
Route::get('/state/{id?}' , [Authcontroller::class , 'get_state'])->name('state.get');
Route::get('/city/{id?}' , [Authcontroller::class , 'get_city'])->name('city.get');
// Address Get
// Feedback Store
Route::post("store/feeback" , [FeedBackController::class , 'store'])->name('feedback.store');
Route::get("search/replies/feeback/{id?}" , [FeedBackController::class , 'searchReplies'])->name('search.replies');
Route::post('/user/register',[Authcontroller::class, "registeration"])->name('user.register.post');
Route::get('/Account_setting',[UserController::class, "Account_setting"])->name('Account_setting');
Route::get('loadPdf/{id?}' , [PDFController::class,'generatePdf'])->name('generate.label');
Route::post('/update/profile/{id?}' , [Authcontroller::class , 'update'])->name('profile.update');
// User Routes For Cart and checkout
Route::get('cartError' , [Cartcontroller::class , 'cart_error'])->name('cart.error');
// User Middle Ware
Route::middleware('user')->group(function(){
Route::get('/checkout', [Checkoutcontroller::class, "index"])->name('checkout');
Route::post('/checkout_store', [Checkoutcontroller::class, "store"])->name('checkout.store');
Route::get('/myaccount', [Authcontroller::class, "edit_user"])->name('myaccount');
Route::get('/addTocart/{id?}' , [Cartcontroller::class , 'store'])->name('cart.store');
Route::get('/deleteCart/{id?}' , [Cartcontroller::class ,'delete'])->name('cart.delete');
Route::get('/addQuantity/{id?}' , [Cartcontroller::class , 'increment'])->name('cart.plus');
Route::get('/minusQuantity/{id?}' , [Cartcontroller::class , 'decrement'])->name('cart.minus');
Route::post('/addAddress' , [Authcontroller::class , 'store_user_address'])->name('add.address');
Route::post('/getAddress' , [Authcontroller::class , 'address_get'])->name('get.address');
Route::get('/specificAddress/{id?}' , [Authcontroller::class , 'specific_address_get'])->name('specific.address');
Route::get('/deleteAddress/{id?}' , [Authcontroller::class , 'address_delete'])->name('delete.address');
Route::get('/last_order/{id?}' , [Authcontroller::class ,'last_order_filter'])->name('filter.last.order');
Route::get('/order_placed' , [Checkoutcontroller::class , 'order_placed_view'])->name('checkout.done');
Route::post('/order_tracking' , [Authcontroller::class , 'order_tracking'])->name('order.track');
Route::post('/address/store' , [Authcontroller::class , 'create_address'])->name('address.create');
});
// End of User Middle Ware
// End of user routes
// Label Controller
Route::get('/view_label/{id?}' , [OrderController::class , 'view_label'])->name('label.view');
Route::get('/download_label/{id?}' , [OrderController::class , 'download_label'])->name('label.download');
// Label End Controller
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
        Route::get('/cancelorder/{id?}' , [OrderController::class , 'cancel_order'])->name('order.cancel');
    });
    // Admin Account Setting
    Route::prefix('account')->group(function(){
        Route::get('setting' , [Authcontroller::class , 'edit_admin'])->name('admin.account.setting');
    });
    // Orders Management System
    Route::prefix('/orders')->group(function(){
        Route::get('/' , [OrderController::class , 'index'])->name('admin.order.index');
        Route::get('/delivered/{id?}' , [OrderController::class , 'delivered_product'])->name('delivered.order');
        Route::get('/shipped/{id?}' , [OrderController::class , 'shipped_product'])->name('shipped.order');
        Route::get('/sent/{id?}' , [OrderController::class , 'sent_delivery'])->name('sent.delivery.order');
        Route::get('/pending' , [OrderController::class , 'pending'])->name('admin.order.pending');
        Route::get('/delivered_orders' , [OrderController::class , 'delivered'])->name('admin.order.delivered');
        Route::get('/shipped_orders' , [OrderController::class , 'shipped'])->name('admin.order.shipped');
        Route::get('/sent_orders' , [OrderController::class , 'sent'])->name('admin.order.sent');
        Route::get('/cancelled_orders' , [OrderController::class , 'cancelled'])->name('admin.order.cancelled');
        Route::get('/delete/{id?}' , [AdminUserController::class , 'delete'])->name('admin.user.delete');

    });
    // SMtp Mail Settings
    Route::prefix('/mail')->group(function(){
        Route::get('/' , [MailSettingController::class , 'index'])->name('admin.mailsetting.index');
        Route::get('/create' , [MailSettingController::class , 'create'])->name('admin.mailsetting.create');
        Route::post('/store/{id?}' , [MailSettingController::class , 'store'])->name('admin.mailsetting.store');
        Route::get('/edit/{id?}' , [MailSettingController::class , 'edit'])->name('admin.mailsetting.edit');
        Route::get('/delete/{id?}' , [MailSettingController::class , 'destroy'])->name('admin.mailsetting.delete');
        Route::get('/change_status' , [MailSettingController::class , 'change_status'])->name('admin.mailsetting.change_status');

    });
    Route::prefix('/carousel')->group(function(){
        Route::get('/' , [CarouselController::class , 'index'])->name('admin.carouselsetting.index');
        Route::get('/create' , [CarouselController::class , 'create'])->name('admin.carouselsetting.create');
        Route::post('/store/{id?}' , [CarouselController::class , 'store'])->name('admin.carouselsetting.store');
        Route::get('/edit/{id?}' , [CarouselController::class , 'edit'])->name('admin.carouselsetting.edit');
        Route::get('/delete/{id?}' , [CarouselController::class , 'destroy'])->name('admin.carouselsetting.delete');
        Route::get('/change_status' , [CarouselController::class , 'change_status'])->name('admin.carouselsetting.change_status');

    });
    Route::prefix('/categorybanner')->group(function(){
        Route::get('/' , [CategoryBannerController::class , 'index'])->name('admin.categorybanner.index');
        Route::get('/create' , [CategoryBannerController::class , 'create'])->name('admin.categorybanner.create');
        Route::post('/store/{id?}' , [CategoryBannerController::class , 'store'])->name('admin.categorybanner.store');
        Route::get('/edit/{id?}' , [CategoryBannerController::class , 'edit'])->name('admin.categorybanner.edit');
        Route::get('/delete/{id?}' , [CategoryBannerController::class , 'destroy'])->name('admin.categorybanner.delete');
        Route::get('/change_status' , [CategoryBannerController::class , 'change_status'])->name('admin.categorybanner.change_status');

    });
    Route::prefix('/homelinks')->group(function(){
        Route::get('/' , [HomeLinkController::class , 'index'])->name('admin.homelinks.index');
        Route::get('/create' , [HomeLinkController::class , 'create'])->name('admin.homelinks.create');
        Route::post('/store/{id?}' , [HomeLinkController::class , 'store'])->name('admin.homelinks.store');
        Route::get('/edit/{id?}' , [HomeLinkController::class , 'edit'])->name('admin.homelinks.edit');
        Route::get('/delete/{id?}' , [HomeLinkController::class , 'destroy'])->name('admin.homelinks.delete');
        Route::get('/change_status' , [HomeLinkController::class , 'change_status'])->name('admin.homelinks.change_status');

    });
    Route::prefix('/settings')->group(function(){
        Route::get('/' , [SettingController::class , 'index'])->name('admin.setting.index');
        Route::get('/create' , [SettingController::class , 'create'])->name('admin.setting.create');
        Route::post('/store/{id?}' , [SettingController::class , 'store'])->name('admin.setting.store');
        Route::get('/edit/{id?}' , [SettingController::class , 'edit'])->name('admin.setting.edit');
        Route::get('/delete/{id?}' , [SettingController::class , 'destroy'])->name('admin.setting.delete');
        Route::get('/change_status' , [SettingController::class , 'change_status'])->name('admin.setting.change_status');

    });
    Route::prefix('/paymentsettings')->group(function(){
        Route::get('/' , [PaymentGetwaySettingsController::class , 'index'])->name('admin.paymentsettings.index');
        Route::get('/create' , [PaymentGetwaySettingsController::class , 'create'])->name('admin.paymentsettings.create');
        Route::post('/store/{id?}' , [PaymentGetwaySettingsController::class , 'store'])->name('admin.paymentsettings.store');
        Route::get('/edit/{id?}' , [PaymentGetwaySettingsController::class , 'edit'])->name('admin.paymentsettings.edit');
        Route::get('/delete/{id?}' , [PaymentGetwaySettingsController::class , 'destroy'])->name('admin.paymentsettings.delete');
        Route::get('/change_status' , [PaymentGetwaySettingsController::class , 'change_status'])->name('admin.paymentsettings.change_status');

    });
    Route::prefix('/aboutussettings')->group(function(){
        Route::get('/' , [AboutUsController::class , 'index'])->name('admin.aboutussettings.index');
        Route::get('/create' , [AboutUsController::class , 'create'])->name('admin.aboutussettings.create');
        Route::post('/store/{id?}' , [AboutUsController::class , 'store'])->name('admin.aboutussettings.store');
        Route::get('/edit/{id?}' , [AboutUsController::class , 'edit'])->name('admin.aboutussettings.edit');
        Route::get('/delete/{id?}' , [AboutUsController::class , 'destroy'])->name('admin.aboutussettings.delete');
        Route::get('/change_status' , [AboutUsController::class , 'change_status'])->name('admin.aboutussettings.change_status');

    });
    Route::prefix('/aboutusbanner')->group(function(){
        Route::get('/' , [AboutUsBannerController::class , 'index'])->name('admin.aboutusbanner.index');
        Route::get('/create' , [AboutUsBannerController::class , 'create'])->name('admin.aboutusbanner.create');
        Route::post('/store/{id?}' , [AboutUsBannerController::class , 'store'])->name('admin.aboutusbanner.store');
        Route::get('/edit/{id?}' , [AboutUsBannerController::class , 'edit'])->name('admin.aboutusbanner.edit');
        Route::get('/delete/{id?}' , [AboutUsBannerController::class , 'destroy'])->name('admin.aboutusbanner.delete');
        Route::get('/change_status' , [AboutUsBannerController::class , 'change_status'])->name('admin.aboutusbanner.change_status');

    });
    Route::prefix('/dealsbanners')->group(function(){
        Route::get('/' , [DealsBannersController::class , 'index'])->name('admin.dealsbanners.index');
        Route::get('/create' , [DealsBannersController::class , 'create'])->name('admin.dealsbanners.create');
        Route::post('/store/{id?}' , [DealsBannersController::class , 'store'])->name('admin.dealsbanners.store');
        Route::get('/edit/{id?}' , [DealsBannersController::class , 'edit'])->name('admin.dealsbanners.edit');
        Route::get('/delete/{id?}' , [DealsBannersController::class , 'destroy'])->name('admin.dealsbanners.delete');
        Route::get('/change_status' , [DealsBannersController::class , 'change_status'])->name('admin.dealsbanners.change_status');

    });
    Route::prefix('/blogs')->group(function(){
        Route::get('/' , [BlogController::class , 'index'])->name('admin.blogs.index');
        Route::get('/create' , [BlogController::class , 'create'])->name('admin.blogs.create');
        Route::post('/store/{id?}' , [BlogController::class , 'store'])->name('admin.blogs.store');
        Route::get('/edit/{id?}' ,    [BlogController::class , 'edit'])->name('admin.blogs.edit');
        Route::get('/delete/{id?}' ,  [BlogController::class , 'destroy'])->name('admin.blogs.delete');
        Route::get('/comment/delete/{id?}' ,  [BlogController::class , 'destroy_comment'])->name('admin.blogs.delete.comment');
        Route::get('/change_status' , [BlogController::class , 'change_status'])->name('admin.blogs.change_status');
        Route::get('/comments' ,      [BlogController::class , 'comments'])->name('admin.blogs.comments');
        Route::get('/view_comments/{id?}' ,      [BlogController::class , 'view_comments'])->name('admin.blogs.view.comment');

    });
    Route::prefix('/user-contacts')->group(function(){
        Route::get('/' , [ContactController::class , 'index'])->name('admin.contact.messages.index');
        Route::get('/create/{id?}' , [ContactController::class , 'create'])->name('admin.contact.messages.create');
        Route::POST('/reply/{id?}' , [ContactController::class , 'reply'])->name('admin.message.reply.post');
        Route::get('/delete/{id?}' ,  [ContactController::class , 'destroy'])->name('admin.contact.messages.delete');
        Route::get('/view_message/{id?}' ,      [ContactController::class , 'view_message'])->name('admin.contact.messages.view.message');

    });
    Route::prefix('/user-feedback')->group(function(){
        Route::get('/' , [AdminFeedBackController::class , 'index'])->name('admin.feedback.messages.index');
        Route::get('/create/{id?}' , [AdminFeedBackController::class , 'create'])->name('admin.feedback.messages.create');
        Route::POST('/reply/{id?}' , [AdminFeedBackController::class , 'store'])->name('admin.message.feedback.reply.post');
        Route::get('/delete/{id?}' ,  [AdminFeedBackController::class , 'destroy'])->name('admin.feedback.messages.delete');
        Route::get('/delete/reply/{id?}' ,  [AdminFeedBackController::class , 'destroy_replied'])->name('admin.feedback.messages.delete.reply');
        Route::get('/view_message/{id?}' ,      [AdminFeedBackController::class , 'view_message'])->name('admin.feedback.messages.view.message');

    });
    Route::get('notifications' , [NotificationController::class ,'fetchNotification'])->name('notification.get');
    Route::get('notificationsremove/{id?}' , [NotificationController::class ,'removeNotification'])->name('remove.notification');
});


