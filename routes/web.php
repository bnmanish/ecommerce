<?php

use Illuminate\Support\Facades\Route;

// backend controllers
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\AdditionalPageController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\SubscriberController;
use App\Http\Controllers\backend\EnquiryController;
// frontend controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;


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
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about-us',[AboutController::class,'aboutUs'])->name('about.us');
Route::get('/contact-us',[ContactController::class,'contactUs'])->name('contact.us');
Route::get('/products',[HomeController::class,'products'])->name('products');
Route::get('/products/{slug}',[HomeController::class,'productsDetails'])->name('products.details');
Route::get('/wishlist',[HomeController::class,'wishlist'])->name('wishlist');
Route::post('/contact-enquiry',[HomeController::class,'contactEnquiry'])->name('contact.enquiry');

Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/logined',[HomeController::class,'logedin'])->name('logedin');

Route::get('/register',[HomeController::class,'register'])->name('register');
Route::post('/sign-up',[HomeController::class,'signUp'])->name('sign.up');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/paypal-return',[HomeController::class,'paypalReturn'])->name('paypal.return');
Route::get('/paypal-cancel',[HomeController::class,'paypalCancel'])->name('paypal.cancel');

Route::middleware(['auth'])->group(function (){
    Route::get('/my-account',[HomeController::class,'myAccount'])->name('my.account');
    Route::get('/cart',[HomeController::class,'cart'])->name('cart');
    Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
    Route::post('/add-cart',[HomeController::class,'addCart'])->name('add.cart');
    Route::get('/clear-cart',[HomeController::class,'clearCart'])->name('clear.cart');
    Route::post('/update-cart',[HomeController::class,'updateCart'])->name('update.cart');
    Route::get('/delete-cart-product',[HomeController::class,'deleteCartProduct'])->name('delete.cart.product');
    Route::post('/make-order',[HomeController::class,'makeOrder'])->name('make.order');
    Route::get('/order-invoice/{orderNo}',[HomeController::class,'orderInvoice'])->name('order.invoice');
    Route::get('/update-account',[HomeController::class,'updateAccount'])->name('update.account');
    Route::post('/update-account/save',[HomeController::class,'updateAccountSave'])->name('update.account.save');
});
Route::get('/paypal/callback',[HomeController::class,'paypalCallback'])->name('paypal.callback');
Route::post('/subscribe-news-letter',[HomeController::class,'subscribeNewsLetter'])->name('subscribe.news.letter');
Route::get('/category/{slug}',[HomeController::class,'category'])->name('product.category');

Route::get('/{url}',[HomeController::class,'additionalPages'])->name('additional.page');

// Admin login route

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('logedin', [LoginController::class, 'logedin'])->name('admin.logedin');

    Route::middleware(['auth','admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Manage user
        Route::get('/add-user', [UserController::class, 'addUser'])->name('admin.add.user');
        Route::post('/store-user', [UserController::class, 'stroeUser'])->name('admin.store.user');

        Route::get('/list-user', [UserController::class, 'listUser'])->name('admin.list.user');
        // get data
        Route::get('/get-user-data', [UserController::class, 'getUserData'])->name('admin.get.user.data');
        // get data
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('admin.edit.user');
        Route::post('/edit-store-user/{id}', [UserController::class, 'editStoreUser'])->name('admin.edit.store.user');
        Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('admin.delete.user');

        // Manage Slider
        Route::get('/add-slider', [SliderController::class, 'addSlider'])->name('admin.add.slider');
        Route::post('/store-slider', [SliderController::class, 'stroeSlider'])->name('admin.store.slider');
        Route::get('/list-slider', [SliderController::class, 'listSlider'])->name('admin.list.slider');
        Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider'])->name('admin.edit.slider');
        Route::post('/edit-store-slider/{id}', [SliderController::class, 'editStoreSlider'])->name('admin.edit.store.slider');
        Route::get('/delete-slider/{id}', [SliderController::class, 'deleteSlider'])->name('admin.delete.slider');

        // category
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('admin.add.category');
        Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('admin.store.category');
        Route::get('/list-category', [CategoryController::class, 'listcategory'])->name('admin.list.category');
        Route::get('/get-list-category', [CategoryController::class, 'getlistData'])->name('admin.get.list.category');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/edit-store-category/{id}', [CategoryController::class, 'editStoreCategory'])->name('admin.edit.store.category');
        Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.delete.category');

        // product
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('admin.add.product');
        Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('admin.store.product');
        Route::get('/list-product', [ProductController::class, 'listProduct'])->name('admin.list.product');
        Route::get('/get-list-product', [ProductController::class, 'getlistData'])->name('admin.get.list.product');
        Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('admin.edit.product');
        Route::post('/edit-store-product/{id}', [ProductController::class, 'editStoreProduct'])->name('admin.edit.store.product');
        Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('admin.delete.product');
        Route::post('/delete-product-image', [ProductController::class, 'deleteProductImage'])->name('admin.delete.product.image');

        // Testimonial
        Route::get('/add-testimonial', [TestimonialController::class, 'addTestimonial'])->name('admin.add.testimonial');
        Route::post('/store-testimonial', [TestimonialController::class, 'storeTestimonial'])->name('admin.store.testimonial');
        Route::get('/list-testimonial', [TestimonialController::class, 'listTestimonial'])->name('admin.list.testimonial');
        Route::get('/get-list-testimonial', [TestimonialController::class, 'getlistTestimonial'])->name('admin.get.list.testimonial');
        Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial'])->name('admin.edit.testimonial');
        Route::post('/edit-store-testimonial/{id}', [TestimonialController::class, 'editStoreTestimonial'])->name('admin.edit.store.testimonial');
        Route::get('/delete-testimonial/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('admin.delete.testimonial');

        // Manage Orders
        Route::get('/list-order', [OrderController::class, 'listOrder'])->name('admin.list.order');
        Route::get('/get-list-order', [OrderController::class, 'getlistOrder'])->name('admin.get.list.order');
        Route::get('/order-invoice/{orderNo}', [OrderController::class, 'orderInvoice'])->name('admin.order.invoice');

        // Manage Setting
        Route::get('/manage-setting', [SettingController::class, 'manageSetting'])->name('admin.manage.setting');
        Route::post('/update-setting', [SettingController::class, 'updateSetting'])->name('admin.update.setting');

        // Manage Page
        Route::get('/add-page', [PageController::class, 'addPage'])->name('admin.add.page');
        Route::post('/store-page', [PageController::class, 'stroePage'])->name('admin.store.page');
        Route::get('/list-page', [PageController::class, 'listPage'])->name('admin.list.page');
        Route::get('/edit-page/{id}', [PageController::class, 'editPage'])->name('admin.edit.page');
        Route::post('/edit-store-page/{id}', [PageController::class, 'editStorePage'])->name('admin.edit.store.page');
        Route::get('/delete-page/{id}', [PageController::class, 'deletePage'])->name('admin.delete.page');

        // Manage Additional
        Route::get('/add-additional-page', [AdditionalPageController::class, 'addPage'])->name('admin.add.additional.page');
        Route::post('/store-additional-page', [AdditionalPageController::class, 'stroePage'])->name('admin.store.additional.page');
        Route::get('/list-additional-page', [AdditionalPageController::class, 'listPage'])->name('admin.list.additional.page');
        Route::get('/edit-additional-page/{id}', [AdditionalPageController::class, 'editPage'])->name('admin.edit.additional.page');
        Route::post('/edit-store-additional-page/{id}', [AdditionalPageController::class, 'editStorePage'])->name('admin.edit.store.additional.page');
        Route::get('/delete-additional-page/{id}', [AdditionalPageController::class, 'deletePage'])->name('admin.delete.additional.page');

        // Subscriber
        Route::get('/list-subscriber', [SubscriberController::class, 'listSubscriber'])->name('admin.list.subscriber');
        Route::get('/get-subscriber-data', [SubscriberController::class, 'getSubscriberData'])->name('admin.get.subscriber.data');
        Route::get('/delete-subscriber/{id}', [SubscriberController::class, 'deleteSubscriber'])->name('admin.delete.subscriber');

        // Contact Enquiry
        Route::get('/list-enquiry', [EnquiryController::class, 'listSubscriber'])->name('admin.list.enquiry');
        Route::get('/get-enquiry-data', [EnquiryController::class, 'getSubscriberData'])->name('admin.get.enquiry.data');
        Route::get('/delete-enquiry/{id}', [EnquiryController::class, 'deleteSubscriber'])->name('admin.delete.enquiry');

        // Admin logout
        Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    });
});

