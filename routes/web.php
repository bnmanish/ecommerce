<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SocialmediaController;
use App\Http\Controllers\backend\MediaController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\SettingController;
// Admin Controllers

// Frontend controllers
use App\Http\Controllers\frontend\HomeController;
// Frontend controllers


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Frontend Route starts
Route::get('/', [HomeController::class, 'home'])->name('home');
// Frontend Routes starts

// Admin Route starts
Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('adminlogin');
Route::post('/admin/logedin', [LoginController::class, 'adminLogedin'])->name('adminlogedin');
Route::get('/admin/logout', [LoginController::class, 'adminlogout'])->name('adminlogout');

Route::group(array('prefix'=>'admin','middleware' => ['auth', 'admin']), function (){

	Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

	//user routes
	Route::get('manage-user', [UserController::class, 'manage'])->name('manage.user');
	Route::get('add-user', [UserController::class, 'add'])->name('add.user');
	Route::post('store-user', [UserController::class, 'store'])->name('store.user');
	Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
	Route::post('store-edit-user/{id}', [UserController::class, 'storeEdit'])->name('store.edit.user');
	Route::get('delete-user/{id}', [UserController::class, 'delete'])->name('delete.user');
	//user routes

	//category routes
	Route::get('manage-category', [CategoryController::class, 'manage'])->name('manage.category');
	Route::get('add-category', [CategoryController::class, 'add'])->name('add.category');
	Route::post('store-category', [CategoryController::class, 'store'])->name('store.category');
	Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
	Route::post('store-edit-category/{id}', [CategoryController::class, 'storeEdit'])->name('store.edit.category');
	Route::get('delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');
	Route::get('category-sequence', [CategoryController::class, 'sequence'])->name('category.sequence');
	//category routes

	//sub category routes
	Route::get('manage-subcategory', [SubCategoryController::class, 'manage'])->name('manage.sub.category');
	Route::get('add-subcategory', [SubCategoryController::class, 'add'])->name('add.sub.category');
	Route::post('store-subcategory', [SubCategoryController::class, 'store'])->name('store.sub.category');
	Route::get('edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit.sub.category');
	Route::post('store-edit-subcategory/{id}', [SubCategoryController::class, 'storeEdit'])->name('store.edit.sub.category');
	Route::get('delete-subcategory/{id}', [SubCategoryController::class, 'delete'])->name('delete.sub.category');
	Route::get('subcategory-sequence', [SubCategoryController::class, 'sequence'])->name('sub.category.sequence');
	//sub category routes

	// Product Route
	Route::get('add-product', [ProductController::class, 'add'])->name('add.product');
	Route::post('store-product', [ProductController::class, 'store'])->name('store.product');
	Route::get('manage-product', [ProductController::class, 'manage'])->name('manage.product');
	Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
	Route::post('store-edit-product/{id}', [ProductController::class, 'storeEdit'])->name('store.edit.product');
	Route::get('delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');
	Route::get('product-sequence', [ProductController::class, 'sequence'])->name('product.sequence');
	// Product Route

	// Get subcat by cat id
	Route::get('get-subcat-by-catid', [ProductController::class, 'getSubcatByCatId'])->name('get.subcat.by.catid');
	// Get subcat by cat id

	// Social Media
	Route::get('add-social-media',[SocialmediaController::class,'add'])->name('add.social.media');
	Route::post('store-social-media',[SocialmediaController::class,'store'])->name('store.social.media');
	Route::get('manage-social-media',[SocialmediaController::class,'manage'])->name('manage.social.media');
	Route::get('edit-social-media/{id}',[SocialmediaController::class,'edit'])->name('edit.social.media');
	Route::post('update-edit-social-media/{id}',[SocialmediaController::class,'updateEdit'])->name('update.edit.social.media');
	Route::get('delete-social-media/{id}',[SocialmediaController::class,'delete'])->name('delete.social.media');
	// Social Media

	// Media
	Route::get('add-media',[MediaController::class,'add'])->name('add.media');
	Route::post('store-media',[MediaController::class,'store'])->name('store.media');
	Route::get('manage-media',[MediaController::class,'manage'])->name('manage.media');
	Route::get('edit-media/{id}',[MediaController::class,'edit'])->name('edit.media');
	Route::post('edit-store-media/{id}',[MediaController::class,'editStore'])->name('edit.store.media');
	Route::get('delete-media/{id}',[MediaController::class,'delete'])->name('delete.media');
	// Media


	// Slider
	Route::get('add-slider',[SliderController::class,'add'])->name('add.slider');
	Route::post('store-slider',[SliderController::class,'store'])->name('store.slider');
	Route::get('manage-slider',[SliderController::class,'manage'])->name('manage.slider');
	Route::get('edit-slider/{id}',[SliderController::class,'edit'])->name('edit.slider');
	Route::post('edit-store-slider/{id}',[SliderController::class,'editStore'])->name('edit.store.slider');
	Route::get('delete-slider/{id}',[SliderController::class,'delete'])->name('delete.slider');
	// Slider

	// Page
	Route::get('add-page',[PageController::class,'add'])->name('add.page');
	Route::post('store-page',[PageController::class,'store'])->name('store.page');
	Route::get('manage-page',[PageController::class,'manage'])->name('manage.page');
	Route::get('edit-page/{id}',[PageController::class,'edit'])->name('edit.page');
	Route::post('edit-store-page/{id}',[PageController::class,'editStore'])->name('edit.store.page');
	Route::get('delete-page/{id}',[PageController::class,'delete'])->name('delete.page');
	// Page

	// Page
	Route::get('website-setting',[SettingController::class,'websiteSetting'])->name('website.setting');
	Route::post('save-website-setting/{id}',[SettingController::class,'saveWebsiteSetting'])->name('save.website.setting');
	// Page

});

// Admin Routes Ends