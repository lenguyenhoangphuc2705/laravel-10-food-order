<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
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
    Route::resource('why-choose-us', WhyChooseUsController::class);
});
