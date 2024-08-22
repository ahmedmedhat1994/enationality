<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FrontendController::class,'index'])->name('frontend.index');


Route::middleware('guest')->group(function () {
Route::get('/login',[FrontendController::class,'login'])->name('login');
Route::post('/otp',[FrontendController::class,'otp'])->name('otp');
Route::post('/otp_validate',[FrontendController::class,'otp_validate'])->name('otp_validate');
});





Route::middleware('auth')->group(function () {
    Route::get('/request', [FrontendController::class, 'request'])->name('request');
    Route::get('/request/edit/{code}', [FrontendController::class, 'request_edit'])->name('request.edit');
    Route::post('/request/update/{id}', [FrontendController::class, 'request_update'])->name('request.update');
    Route::get('/tracking/{code}', [FrontendController::class, 'sucssess'])->name('sucssess');
    Route::get('/tracking', [FrontendController::class, 'tracking'])->name('tracking');
    Route::post('/tracking/go', [FrontendController::class, 'trackingGo'])->name('trackingGo');
    Route::post('/request/store', [FrontendController::class, 'request_store'])->name('request.store');

    Route::post('/logout', [FrontendController::class, 'logout'])->name('logout');
    Route::get('/pay/{code}', [FrontendController::class, 'pay'])->name('pay');
    Route::post('/pay/go', [FrontendController::class, 'payGo'])->name('payGo');


    Route::get('/admin/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/request/review/{id}', [FrontendController::class, 'review'])->name('review');
    Route::post('/admin/request/review/update', [FrontendController::class, 'review_update'])->name('review_update');


});


Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
//    Artisan::call('cache:forget spatie.permission.cache');
//    Artisan::call('permission:cache-reset');
    return "Cache is cleared";
})->name('clear.cache');
