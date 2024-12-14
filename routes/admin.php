<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmentityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\chatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ListingController;
// use App\Http\Controllers\Admin\listingImageGallery;
use App\Http\Controllers\Admin\listingImageGalleryController;
use App\Http\Controllers\Admin\listingScheduleController;
use App\Http\Controllers\Admin\listingVideoGalleryController;
use App\Http\Controllers\Admin\locationController;
use App\Http\Controllers\admin\orderController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\paymentSettingController;
use App\Http\Controllers\admin\reviewController;
use App\Http\Controllers\admin\settingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login')->middleware('logined');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.submit');

Route::group(
    [
        'middleware' => ['auth', 'user.type:admin'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('update.profile');
        Route::post('/password', [ProfileController::class, 'updatePassword'])->name('update.password');

        Route::get('/hero', [HeroController::class, 'hero_index'])->name('hero');
        Route::post('/hero/update', [HeroController::class, 'update'])->name('hero.update');

        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/category/edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/edit/update/{slug}', [CategoryController::class, 'change'])->name('category.edit.submit');
        Route::post('/category/update', [CategoryController::class, 'store'])->name('category.update');

        Route::get('/location', [locationController::class, 'index'])->name('location');
        Route::get('/location/create', [locationController::class, 'create'])->name('location.create');
        Route::get('/location/edit/{slug}', [locationController::class, 'edit'])->name('location.edit');
        Route::post('/location/edit/update/{slug}', [locationController::class, 'change'])->name('location.edit.submit');
        Route::post('/location/update', [locationController::class, 'store'])->name('location.update');

        Route::get('/amentities', [AmentityController::class, 'index'])->name('amentity');
        Route::get('/amentities/create', [AmentityController::class, 'create'])->name('amentity.create');
        Route::get('/amentities/edit/{slug}', [AmentityController::class, 'edit'])->name('amentity.edit');
        Route::post('/amentities/edit/update/{slug}', [AmentityController::class, 'change'])->name('amentity.edit.submit');
        Route::post('/amentities/update', [AmentityController::class, 'store'])->name('amentity.update');

        Route::get('/listing', [ListingController::class, 'index'])->name('listing');
        Route::get('/listing/create', [ListingController::class, 'create'])->name('listing.create');
        Route::post('/listing/update', [ListingController::class, 'store'])->name('listing.update');
        Route::get('/listing/edit/{slug}', [ListingController::class, 'edit'])->name('listing.edit');
        Route::post('/listing/edit/update/{slug}', [ListingController::class, 'change'])->name('listing.edit_submit');
        Route::get('/listing/delete/{id}', [ListingController::class, 'destroy'])->name('listing.delete');

        Route::resource('/listing-image-gallery', listingImageGalleryController::class);
        Route::resource('/listing-video-gallery', listingVideoGalleryController::class);


        Route::get('/listing-schedule/{list_id}', [listingScheduleController::class, 'index'])->name('listing.schedule.home');
        Route::get('/listing-schedule/create/{list_id}', [listingScheduleController::class, 'create'])->name('listing.schedule.create');
        Route::post('/listing-schedule/{list_id}', [listingScheduleController::class, 'store'])->name('listing.schedule.store');
        Route::get('/listing-schedule/edit/{list_id}/{id}', [listingScheduleController::class, 'edit'])->name('listing.schedule.edit');
        Route::post('/listing-schedule/delete/{list_id}', [listingScheduleController::class, 'edit'])->name('listing.schedule.delete');
        Route::post('/listing-schedule/change/{list_id}/{id}', [listingScheduleController::class, 'change'])->name('listing.schedule.change');

        Route::resource('/package', PackageController::class);

        Route::get('/settings', [settingController::class, 'index'])->name('setting.index');
        Route::post('/settings/create', [settingController::class, 'create'])->name('setting.create');
        Route::post('pusher/settings/create', [settingController::class, 'pusher_create'])->name('setting.pusher.create');

        Route::get('/payment/settings', [paymentSettingController::class, 'index'])->name('payment.setting.index');
        Route::post('/payment/settings/create', [paymentSettingController::class, 'create'])->name('payment.setting.create');

        Route::get('/orders', [orderController::class, 'index'])->name('orders.index');
        Route::get('/orders/view/{id}', [orderController::class, 'viewDetails'])->name('orders.view');
        Route::post('/orders/edit/{id}', [orderController::class, 'edit'])->name('orders.edit');

        Route::get('/review', [reviewController::class, 'index'])->name('listing.review');
        Route::post('/review/update/{rev_id}', [reviewController::class, 'update'])->name('listing.review.update');
        Route::get('/chat_box',[chatController::class,'index'])->name('message');
        Route::get('/a_message/chat_box/conversation/{sender_id}/{list_id}',[chatController::class,'conversation'])->name('message.conversation');
        Route::get('/a_Conversation/send/{sender_id}/{reciever_id}/{list_id}/{msg}',[chatController::class,'send_msg'])->name('message.send');
    }
);
