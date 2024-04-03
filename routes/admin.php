<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){


    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    /* Profile Route*/
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');


    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    /* slider Route*/
    Route::resource('slider', SliderController::class);

    /* Why Choose Us Route*/
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

     /* Product  Category Route*/
Route::resource('category', CategoryController::class);

  /* Product  Category Route*/
  Route::resource('product',ProductController::class );

/* Product  Gallery Route*/
Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
Route::resource('product-gallery',ProductGalleryController::class );

/* Product  Size Route*/
Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
Route::resource('product-size',ProductSizeController::class );

});
