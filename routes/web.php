<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

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

// Route::get("/", [ProductController::class, "index"]);
Route::get("/", function() {
    return view("home", [
        "products" => Product::latest()->paginate(10)
    ]);
});

Route::resource("/products", ProductController::class)->middleware("auth");
Route::get("/aboutus", function() {
    return view("components/aboutus");
});
Route::resource("/cart", CartController::class)->middleware("auth");
Route::post("/cart/checkout", [CartController::class, "checkout"])->middleware("auth");

Route::get("/profile", [UserController::class, "index"])->middleware("auth");

Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/categories/{id}", [CategoryController::class, "show"]);
// Route::post("/categories/{id}", [CategoryController::class, "addToCart"]);

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/register", [RegisterController::class, "index"]);
Route::post("/register", [RegisterController::class, "store"]);