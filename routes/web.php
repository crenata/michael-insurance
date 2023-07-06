<?php

use Illuminate\Support\Facades\Auth;
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

Route::get("/", function () {
    return view("welcome");
});

Auth::routes();

Route::get("home", [App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::prefix("broker")->middleware("auth")->group(function () {
    Route::prefix("quotation")->group(function () {
        Route::resource("/", \App\Http\Controllers\Broker\QuotationController::class)->names("broker.quotation");
        Route::post("next", [\App\Http\Controllers\Broker\QuotationController::class, "next"])->name("broker.quotation.next");
        Route::get("rejected", [\App\Http\Controllers\Broker\QuotationController::class, "rejected"])->name("broker.quotation.rejected");
    });
});
