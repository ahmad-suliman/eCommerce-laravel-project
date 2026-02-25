<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\category;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewContrller;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

//login Page
Route::get('/login',function (){
    return view('login');
})->name('login');
Route::post('/login',[UserController::class,'loginUser']);
//signup page 
Route::get('/signup', function (){
    return view('signup');
});
//logout
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/crateuser',[UserController::class,'createUser']);


//The Welcome Page Route
Route::get('/', function () {
    $category = category::all();
    return view('welcome',['categories'=>$category]);
})->middleware('auth');

//Category Routr Page
Route::get('/category',function (){
    $product = Product::all();
    $category = category::all();
    return view('category',['products'=>$product,'categories'=>$category]);
})->middleware('auth');
//product CRUD Routes
Route::get('/product/{catid?}',[ProductController::class,'showProduct'])->middleware('auth');
Route::get('/addProduct',[ProductController::class, 'addProduct'])->name('add')->middleware('auth');
Route::get('/editproduct/{productId}',[ProductController::class,'editproduct'])->middleware('auth');
Route::post('/storeproduct',[ProductController::class,'storeProduct']);
Route::get('/deleteproduct/{productId}',[ProductController::class,'deleteproduct'])->middleware('auth');
Route::get('/singleProduct/{product_id}',[ProductController::class,'singleProduct']);
Route::get('/addImages/{productid}',[ProductController::class,'addImages']);
Route::post('/addmultiimage',[ProductController::class,'saveImage']);
Route::get('/deleteimage/{image_id}',[ProductController::class,'deleteImage']);
//cart route
Route::get('/cart',[CartController::class,'cart'])->middleware('auth');
Route::post('/addCart',[CartController::class,'addToCart']);
Route::get('/deleteItem/{id}',[CartController::class,'deleteItem']);
// Review Route Page 
Route::get('/review',[ReviewContrller::class,'review'])->middleware('auth');
Route::post('/addReview',[ReviewContrller::class,'addReview']);

//contact page
Route::get('/contact',[ContactController::class,'showContact'])->middleware('auth');
Route::post('/storgemessage',[ContactController::class,'storgeMessage'])->middleware('auth');

//profile page
Route::get('/profile/{user_id}',[ProfileController::class,'showUserInfo'])->middleware('auth');
 
//check out
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'createSession'])
        ->name('checkout.session');

    Route::get('/checkout-success', [CheckoutController::class, 'success'])
        ->name('checkout.success');

    Route::get('/checkout-cancel', [CheckoutController::class, 'cancel'])
        ->name('checkout.cancel');
});
//Admin Area
    //admin panel
    Route::get('/admin/dashbord',[AdminController::class,'showDashborad']);
    Route::get('/admin/productTable',[AdminController::class,'data']);
    Route::get('/admin/reviewtable',[AdminController::class,'showtable']);
    Route::get('/admin/deletereview/{reviewId}',[AdminController::class,'deletereview']);
    Route::get('/admin/messagetable',[AdminController::class,'showmessage']);
    Route::get('/admin/markmessage/{message_id}',[AdminController::class,'markRead']);
    Route::get('/admin/deletemessage/{message_id}',[AdminController::class,'deleteRead']);
    Route::get('/admin/usertable',[AdminController::class,'showusers']);
    Route::get('/admin/deleteuser/{user_id}',[AdminController::class,'deleteUser']);