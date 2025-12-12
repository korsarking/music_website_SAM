<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Checkout;

Route::get("/", [GeneralController::class, "home"])->name("home");

Route::get("/about", [GeneralController::class, "about"])->name("about");

Route::get("/contacts", [GeneralController::class, "contacts"])->name("contacts");

Route::get("/tour", [GeneralController::class, "tour"])->name("tour");

Route::get("/albums", [AlbumController::class, "index"])->name("album-list");

Route::get("/album/{slug}", [AlbumController::class, "show"])->name("album-viewer");

Route::get("/store", [GeneralController::class, "store"])->name("store");

Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");

Route::get("/product/{slug}", [ProductController::class, "show"])->name("show-product");

Route::get("/login", [AuthController::class, "login"])->name("login");

Route::get("/register", [AuthController::class, "register"])->name("register");

Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::post("/register", [AuthController::class, "registerPost"])->name("registerPost");

Route::post("/login", [AuthController::class, "loginPost"])->name("loginPost");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "index"])->name("profile.index");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");

    Route::get("/cart", [CartController::class, "show"])->name("cart.show");
    Route::get("/checkout", Checkout::class)->name("checkout");
});


