<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ** Auth Routes **
Route::prefix("auth")->group(function () {
    Route::post("login", [AuthController::class, "login"]);
    Route::post("register", [AuthController::class, "register"]);

    Route::middleware('auth:api')->group(function () {
        Route::get("logout", [AuthController::class, "logout"]);
    });
});

// ** Protected Routes **
Route::middleware('auth:api')->group(function () {

    // ** Address Routes **
    Route::prefix("address")->group(function () {
        Route::get("/", [AddressController::class, "index"]);
        Route::get("/{id}", [AddressController::class, "show"])->whereNumber("id");
        Route::get("/by-user/{id}", [AddressController::class, "showByUser"])->whereNumber("id");

        Route::post("/", [AddressController::class, "store"]);
        Route::post("/{id}", [AddressController::class, "update"])->whereNumber("id");

        Route::delete("/{id}", [AddressController::class, "delete"])->whereNumber("id");
    });
});
