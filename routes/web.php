<?php

use App\Models\User;
use App\Http\Livewire\Main\Blog;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Main\Plans;
use App\Http\Livewire\Main\Afilate;
use App\Http\Livewire\Main\Archive;
use App\Http\Livewire\Main\Profile;
use App\Http\Livewire\Main\Support;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Main\Products;
use App\Http\Livewire\Main\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Main\SummaryOrder;
use App\Http\Livewire\Auth\BusinessPurchase;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Voyager\ToolsController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Voyager\CurrencyController;
use App\Http\Controllers\Voyager\PackagesController;
use App\Http\Controllers\Voyager\AffiliateController;
use App\Http\Controllers\Voyager\AnalyticsController;
use App\Http\Controllers\Payment\PaymentWebhookController;
use App\Http\Controllers\Voyager\UserManagementController;

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



Route::post('/webhook/razorpay', [PaymentWebhookController::class, 'handleRazorpayCallback'])->name('payment.webhook.razorpay'); 



Route::middleware(['guest'])->group(function() {
    Route::get('/register', Register::class)->name('auth.showRegister');
    Route::get('/login', Login::class)->name('auth.showLogin');

    Route::get('/register/business-purchase', BusinessPurchase::class)->middleware('redirected')->name('auth.showBusinessPurchase');
    
    Route::controller(AuthController::class)->group(function() {
        Route::post('/register', 'register')->name('auth.register');
        Route::post('/login', 'login')->name('auth.login');

        Route::post('/register/business-purchase', 'businessPurchase')->middleware('redirected')->name('auth.businessPurchase');
    });
});

Route::middleware(['auth'])->group(function() {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/plans', Plans::class)->name('plans');
    Route::get('/blog', Blog::class)->name('blog');
    Route::get('/archive', Archive::class)->name('archive');
    Route::get('/afilate', Afilate::class)->name('afilate');
    Route::get('/cart', SummaryOrder::class)->name('summaryOrder');
    Route::get('/support', Support::class)->name('support');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::get('/user/profile', Profile::class)->name('user.profile');
    Route::post('/user/update-name', [UserController::class, 'updateName'])->name('user.updateName');
    Route::post('/user/update-phone', [UserController::class, 'updatePhone'])->name('user.updatePhone');
    Route::get('/user/products', Products::class)->name('products');
    
    Route::controller(CartController::class)->name('cart.')->group(function() {
        Route::post('/cart/add', 'add')->name('add');
        Route::post('/cart/remove', 'remove')->name('remove');
        Route::post('/cart/session/reload', 'sessionReload')->name('session.reload');
    });

    Route::name('payment.')->prefix('payment')->group(function() {
        Route::post('/razorpay',[PaymentController::class, 'payWithRazorpay'])->name('razorpay');
    });
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();


    Route::get('/users/{id}', [UserManagementController::class, 'getUserData'])->name('voyager.users.show');

    Route::group(['as' => 'admin.'], function() {
        Route::resource('tools', ToolsController::class);
        Route::resource('packages', PackagesController::class);
        Route::resource('affiliates', AffiliateController::class);

        Route::post('/users/{id}/update/block', [UserManagementController::class, 'blockUser'])->name('users.update.block');
        Route::post('/users/{id}/update/unblock', [UserManagementController::class, 'unblockUser'])->name('users.update.unblock');
        Route::put('/users/{id}/update', [UserManagementController::class, 'update'])->name('users.update');


        Route::controller(AnalyticsController::class)->prefix('analytics')->name('analytics.')->group(function() {
            Route::get('/latest-logins', 'showLatestLogins')->name('showLatestLogins');
            Route::get('/daily-signups', 'getDailySignups')->name('dailySignups');
            Route::get('/payments', 'getPayments')->name('payments');
        });

        Route::controller(CurrencyController::class)->prefix('currencies')->name('currencies.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/update-currencies', 'updateCurrencies')->name('updateCurrencies');
        });
    });

});