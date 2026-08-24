<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DevMailController;
use App\Http\Controllers\SmsVerificationController;

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



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    route::get('/dashboard', [HomeController::class, 'Home'])->name('dashboard');
});

/* Dev Email Viewer (disabled) */
// Route::get('/dev/emails', [DevMailController::class, 'index'])->name('dev.emails');
// Route::post('/dev/emails/clear', [DevMailController::class, 'clear'])->name('dev.emails.clear');


/* Admin Routes */

route::get('/view_category', [AdminController::class, 'ViewCategory'])->name('admin.category');
route::post('/add_category', [AdminController::class, 'AddCategory'])->name('admin.add_category');
route::get('/delete_category/{id}', [AdminController::class, 'DeleteCategory']);
route::get('/view_product', [AdminController::class, 'ViewProduct'])->name('admin.view_product');
route::post('/add_product', [AdminController::class, 'AddProduct'])->name('admin.add_product');
route::get('/show_product', [AdminController::class, 'ShowProduct'])->name('admin.show_product');
route::get('/delete_product/{id}', [AdminController::class, 'DeleteProduct'])->name('admin.delete_product');
route::get('/edit_product/{id}', [AdminController::class, 'EditProduct'])->name('admin.edit_product');
route::post('/update_product/{id}', [AdminController::class, 'UpdateProduct']);
Route::get('/search-product', [AdminController::class, 'SearchProduct']);
Route::get('/search-order', [AdminController::class, 'SearchOrder']);
route::get('/user-orders', [AdminController::class, 'UserOrders'])->name('admin.user_orders');
route::get('/update-order/{user_id}/{order_id}/{delivery_status}', [AdminController::class, 'UpdateOrder']);
route::get('/print-bill/{order_id}', [AdminController::class, 'PrintBill']);
route::get('/customers', [AdminController::class, 'Customers']);
route::get('/delete-user/{id}', [AdminController::class, 'DeleteUser']);
Route::get('/search-user', [AdminController::class, 'SearchUser']);

/* User routes */

route::get('/', [HomeController::class, 'index']);
route::get('/home', [HomeController::class, 'Home'])->name('home')->middleware('auth','verified');
route::get('/my-account', [HomeController::class, 'UserAccount'])->name('user.account');
Route::post('/user/add-product', [HomeController::class, 'userAddProduct'])->name('user.add_product');
Route::get('/user/delete-product/{id}', [HomeController::class, 'userDeleteProduct'])->name('user.delete_product');
Route::get('/user/edit-product/{id}', [HomeController::class, 'userEditProduct'])->name('user.edit_product');
Route::post('/user/update-product/{id}', [HomeController::class, 'userUpdateProduct'])->name('user.update_product');
Route::post('/user/refill-stock/{id}', [HomeController::class, 'userRefillStock'])->name('user.refill_stock');
Route::post('/user/update-order-status/{id}', [HomeController::class, 'userUpdateOrderStatus'])->name('user.update_order_status');
Route::post('/user/add-category', [HomeController::class, 'userAddCategory'])->name('user.add_category');
Route::get('/user/delete-category/{id}', [HomeController::class, 'userDeleteCategory'])->name('user.delete_category');
Route::post('/user/update-category/{id}', [HomeController::class, 'userUpdateCategory'])->name('user.update_category');
route::get('/user/logout', [HomeController::class, 'UserLogout'])->name('user.logout');
Route::get('/product_details/{id}',[HomeController::class, 'ProductDetails']);
Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
Route::post('/contact/send', [HomeController::class, 'SendContactMail'])->name('user.contact.send');
Route::post('/add-to-cart/{id}', [HomeController::class, 'AddToCart']);
Route::get('/my-cart',[HomeController::class, 'CartPage'])->name('user.cart');
Route::get('/remove-product-from-cart/{id}',[HomeController::class, 'RemoveProductFromCart']);
Route::get('/clear-cart', [HomeController::class, 'ClearCart'])->name('user.clear_cart');
Route::get('/checkout', [HomeController::class,'Checkout'])->name('user.checkout');
Route::get('/orders', [HomeController::class, 'UserOrders'])->name('user.orders');
Route::get('/order-received/{id}', [HomeController::class, 'OrderReceived']);
Route::get('/cancel-order/{id}', [HomeController::class, 'CancelOrder']);
Route::get('/search-a-product', [HomeController::class, 'SearchProduct']);
Route::get('/update-password', [HomeController::class, 'UpdatePassword']);
Route::get('/rewards', [HomeController::class, 'RewardsPage'])->name('rewards');
Route::post('/rewards/store', [HomeController::class, 'StoreReward'])->name('rewards.store')->middleware('auth');
Route::get('/rewards/delete/{id}', [HomeController::class, 'DeleteReward'])->name('rewards.delete')->middleware('auth');
Route::get('/technology-news', [HomeController::class, 'GetTechnologyNews'])->name('news');


Route::get('/cash-order', [HomeController::class, 'CashOrder']);
Route::get('/stripe/{totalPrice}', [HomeController::class, 'Stripe']);
Route::post('/stripe/{totalPrice}', [HomeController::class, 'StripePost'])->name('stripe.post');

/* Guest SMS OTP Login Routes */
Route::get('/sms-login', [SmsVerificationController::class, 'showSmsLoginForm'])->name('sms.login');
Route::post('/sms-login/send', [SmsVerificationController::class, 'sendSmsLoginOtp'])->name('sms.login.send');
Route::get('/sms-login/verify', [SmsVerificationController::class, 'showSmsLoginVerifyForm'])->name('sms.login.verify');
Route::post('/sms-login/verify', [SmsVerificationController::class, 'verifySmsLoginOtp'])->name('sms.login.verify.post');

/* Messages & SMS Verification routes */
Route::middleware(['auth'])->group(function () {
    Route::get('/verify-sms', [SmsVerificationController::class, 'showVerifyForm'])->name('sms.verify');
    Route::post('/verify-sms', [SmsVerificationController::class, 'verifySms'])->name('sms.verify.post');
    Route::post('/verify-sms/resend', [SmsVerificationController::class, 'resendSms'])->name('sms.verify.resend');

    Route::get('/messages', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('/messages/chat/{userId}', [MessageController::class, 'getMessages'])->name('messages.chat');
    Route::get('/messages/sync', [MessageController::class, 'sync'])->name('messages.sync');
    Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('messages.send');
    Route::get('/messages/start/{productId}', [MessageController::class, 'startChat'])->name('messages.start');
    Route::post('/user/update-profile', [HomeController::class, 'updateProfile'])->name('user.update_profile');
    Route::post('/user/delete-account', [HomeController::class, 'deleteOwnAccount'])->name('user.delete_account');
    Route::post('/verify-password', [SmsVerificationController::class, 'verifyPasswordAccount'])->name('verify.password');
    Route::post('/seller/review', [HomeController::class, 'storeSellerReview'])->name('seller.review');
});
