<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudioController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


// view homepage/index page
Route::get('/', [HomeController::class, 'viewHomepage'])->name('homepage');


// view about us page
Route::get('/about', function () {
    return view('about.about');
});


// view catalog page
Route::get('/catalog', [CatalogController::class, 'viewCatalog']);

// view how it work page
Route::get('/how', function () {
    return view('how.how');
});

// view detail 
Route::get('/detail/totebag/{id}',[CatalogController::class, "viewDetail"])->name("view.detail");



Route::middleware([AuthMiddleware::class])->group(function () {

    // studio page
    Route::get('/studio/totebag/{id}', [StudioController::class, 'viewStudio'])->name("view.studio");


    // view cart
    Route::get("/cart", [CartController::class, "viewCart"]);
    Route::post("/cart/add/{id}", [CartController::class, "store"])->name("cart.add");
    Route::delete("/cart/delete/{id}", [CartController::class, "delete"])->name("cart.delete");



    // Profile dashboard
    // view dashboard user
    Route::get('/dashboard', [ProfileController::class, 'viewDashboard']); 

    // view edit profile form 
    Route::get('/dashboard/edit', [ProfileController::class, 'viewEditForm']);
    Route::put('/dashboard/edit', [ProfileController::class, 'storeEdit'])->name('update.user');

    // view delete account
    Route::get('/dashboard/delete', [ProfileController::class, 'viewDeleteForm']);
    Route::delete('/dashboard/delete', [ProfileController::class, 'destroyUser'])->name('delete.user');


    // view address profile form
    Route::get('/dashboard/address', [ProfileController::class, 'viewAddressForm']);


    // view payment profile form
    Route::get('/dashboard/payment', [ProfileController::class, 'viewPayment'])->name('index.payment.method');
    Route::get('/dashboard/payment/form', [ProfileController::class, 'viewPaymentForm']);
    Route::post('/dashboard/payment', [ProfileController::class, 'storePayment'])->name('store.payment.method');
    Route::delete('/dashboard/payment/{id}', [ProfileController::class, 'destroyPayment'])->name('destroy.payment.method');
});


// login + Register
// view login form
Route::get('/login', [AuthUserController::class, 'viewLoginForm'])->name("login.user");

// login user
Route::post('/login', [AuthUserController::class, 'login'])->name('login.user.post');

// register form
Route::get('/register', [AuthUserController::class, 'viewRegisterForm']);

// create user berdasarkan register form
Route::post('/register', [AuthUserController::class, 'storeRegisterUser'])->name('register.user.post');

// logout user
Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout.user');


