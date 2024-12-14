<?php

use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\profileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\frontend\agentListingController;
use App\Http\Controllers\frontend\chatController;
use App\Http\Controllers\frontend\HeroController;
use App\Http\Controllers\Frontend\listingImageGalleryController;
use App\Http\Controllers\Frontend\ListingScheduleController;
use App\Http\Controllers\Frontend\listingVideoGalleryController;
use App\Http\Controllers\frontend\orderController;
use App\Http\Controllers\frontend\reviewController;
use App\Http\Controllers\Frontend\UserAuthController;
use App\Http\Middleware\package;
use App\Models\allList;

Route::group(
    [
        'middleware' => 'logined',
        'prefix' => 'user',
        'as' => 'user.'
    ],
    function () {
        Route::get('/login', [UserAuthController::class, 'login'])->name('login');
        Route::post('/login/store', [AuthenticatedSessionController::class, 'store'])->name('login.submit');
        Route::get('/register', [UserAuthController::class, 'register'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.submit');
        Route::get('forgot-password', [UserAuthController::class, 'change_password'])
            ->name('password.request');
    }
);

Route::get('/index', [HeroController::class, 'index'])->name('frontend.index');
Route::group(
    [
        'middleware' => ['auth', 'user.type:user'],
        'prefix' => 'user',
        'as' => 'user.',
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/update', [profileController::class, 'profilePg'])->name('update');
        Route::post('/edit/details', [profileController::class, 'change_detail'])->name('edit');
        Route::post('/password', [profileController::class, 'updatePassword'])->name('update.password');
        Route::get('/dashboard/message',[chatController::class,'index'])->name('message.index');
        Route::get('/dashboard/message/send',[chatController::class,'send_msg'])->name('message.send');
        Route::get('user/dashboard/getConversation/{reciever_id}/{list_id}',[chatController::class,'conversation'])->name('message.conversation');
        
    }
);

Route::group(
    [
        'middleware' => ['auth', 'user.type:user',package::class],
        'prefix' => 'user',
        'as' => 'user.',
    ],
    function () {

        Route::resource('/agent-listing', agentListingController::class);
        Route::resource('/listing-image-gallery', listingImageGalleryController::class);
        Route::resource('/listing-video-gallery', listingVideoGalleryController::class);

        Route::get('/listing-schedule/{list_id}', [listingScheduleController::class, 'index'])->name('listing.schedule.home');
        Route::get('/listing-schedule/create/{list_id}', [listingScheduleController::class, 'create'])->name('listing.schedule.create');
        Route::post('/listing-schedule/{list_id}', [listingScheduleController::class, 'store'])->name('listing.schedule.store');
        Route::get('/listing-schedule/edit/{list_id}/{id}', [listingScheduleController::class, 'edit'])->name('listing.schedule.edit');
        Route::post('/listing-schedule/delete/{list_id}', [listingScheduleController::class, 'edit'])->name('listing.schedule.delete');
        Route::post('/listing-schedule/change/{list_id}/{id}', [listingScheduleController::class, 'change'])->name('listing.schedule.change');
    }
);

Route::group(
    [
        'prefix' => 'user',
        'as' => 'user.',
    ],
    function () {
        Route::get('/listing/category/{slug}', [HeroController::class, 'listing_category'])->name('listing.list_cat');
        Route::get('/listing/listing_cat_model/{list_id}', function ($list_id) {
            $listing = new allList();
            $listing = $listing->select('*')->where('id', '=', $list_id)->first();
            echo "hii";
            // return view('frontend.pages.listing_cat_model',compact('listing'));
        })->name('user.listing.listing_cat_model');

        Route::get('/listing/listing-details/{slug}', [HeroController::class, 'show'])->name('listing.list_view');
        Route::get('/listing/package', [HeroController::class, 'showPackages'])->name('listing.packages');
        Route::get('/listing/package/checkout/{id}', [HeroController::class, 'checkout'])->name('listing.packages.checkout');
        Route::post('/listing/package/checkout/pay-pal/{id}', [orderController::class, 'orderPayment'])->name('order.payment');
        Route::get('/orders', [orderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [orderController::class, 'viewDetails'])->name('orders.view');
        Route::get('/review', [reviewController::class, 'store'])->name('listing.review');
    }


);
