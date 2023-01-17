<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufactureController;
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

        Route::put("/{id}", [AddressController::class, "update"])->whereNumber("id");

        Route::delete("/{id}", [AddressController::class, "delete"])->whereNumber("id");
    });

    // ** Category Routes **
    Route::prefix("category")->group(function () {
        Route::get("/", [CategoryController::class, "index"]);
        Route::get("/{id}", [CategoryController::class, "show"])->whereNumber("id");

        Route::post("/", [CategoryController::class, "store"]);

        Route::put("/{id}", [CategoryController::class, "update"])->whereNumber("id");

        Route::delete("/{id}", [CategoryController::class, "delete"])->whereNumber("id");
    });

    // ** Manufacture Routes **
    Route::prefix("manufacture")->group(function () {
        Route::get("/", [ManufactureController::class, "index"]);
        Route::get("/{id}", [ManufactureController::class, "show"])->whereNumber("id");

        Route::post("/", [ManufactureController::class, "store"]);

        Route::put("/{id}", [ManufactureController::class, "update"])->whereNumber("id");

        Route::delete("/{id}", [ManufactureController::class, "delete"])->whereNumber("id");
    });
});
