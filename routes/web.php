<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudioController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;


// view homepage/index page
Route::get('/', [HomeController::class, 'viewHomepage'])->name('homepage');


// view about us page
Route::get('/about', function () {
    return view('about.about');
});

// Route::get('/catalog', function () {
//     return view('catalog.catalog');
// });

// view catalog page
Route::get('/catalog', [CatalogController::class, 'viewCatalog']);

// view how it work page
Route::get('/how', function () {
    return view('how.how');
});

// view detail temp
Route::get('/detail', function (){
    return view('detail.detail');
});


// view studio
Route::middleware(['auth'])->group(function () {

    // studio page
    Route::get('/studio', [StudioController::class, 'viewStudio']);
});

// view cart
Route::middleware(['auth'])->group(function (){

    Route::get("/cart", [CartController::class, "viewCart"]);
    Route::post("/cart/add", [CartController::class, "store"])->name("cart.add");
});



// view studio page
// Route::get("/studio", [StudioController::class, "viewStudio"]);


// login + Register
// view login form
Route::get('/login', [AuthUserController::class, 'viewLoginForm']);

// login user
Route::post('/login', [AuthUserController::class, 'login'])->name('login.user');

// register form
Route::get('/register', [AuthUserController::class, 'viewRegisterForm']);

// create user berdasarkan register form
Route::post('/register', [AuthUserController::class, 'storeRegisterUser'])->name('register.user');

// logout user
Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout.user');


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
Route::delete('/dashboard/payment{id}', [ProfileController::class, 'destroyPayment'])->name('destroy.payment.method');