<?php

use Illuminate\Support\Facades\Route;

// backend controllers
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TestimonialController;
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
Route::get('/my-account',[HomeController::class,'myAccount'])->name('my.account');
Route::get('/wishlist',[HomeController::class,'wishlist'])->name('wishlist');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');



Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/register',[HomeController::class,'register'])->name('register');



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

        // Testimonial
        Route::get('/add-testimonial', [TestimonialController::class, 'addTestimonial'])->name('admin.add.testimonial');
        Route::post('/store-testimonial', [TestimonialController::class, 'storeTestimonial'])->name('admin.store.testimonial');
        Route::get('/list-testimonial', [TestimonialController::class, 'listTestimonial'])->name('admin.list.testimonial');
        Route::get('/get-list-testimonial', [TestimonialController::class, 'getlistTestimonial'])->name('admin.get.list.testimonial');
        Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial'])->name('admin.edit.testimonial');
        Route::post('/edit-store-testimonial/{id}', [TestimonialController::class, 'editStoreTestimonial'])->name('admin.edit.store.testimonial');
        Route::get('/delete-testimonial/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('admin.delete.testimonial');



        
        // Admin logout
        Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    });
});
