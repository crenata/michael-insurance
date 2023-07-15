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

Route::middleware("auth")->group(function () {
    Route::get("home", [App\Http\Controllers\HomeController::class, "index"])->name("home");
    Route::get("chart", [App\Http\Controllers\HomeController::class, "chart"])->name("chart");

    Route::prefix("quotation")->group(function () {
        Route::get("flow", [\App\Http\Controllers\HomeController::class, "flow"])->name("quotation.flow");
        Route::get("created", [\App\Http\Controllers\HomeController::class, "created"])->name("quotation.created");
        Route::get("rejected", [\App\Http\Controllers\HomeController::class, "rejected"])->name("quotation.rejected");
    });

    Route::prefix("broker")->group(function () {
        Route::prefix("quotation")->group(function () {
            Route::resource("/", \App\Http\Controllers\Broker\QuotationController::class)->names("broker.quotation");
            Route::get("next", [\App\Http\Controllers\Broker\QuotationController::class, "next"])->name("broker.quotation.next");
            Route::post("next", [\App\Http\Controllers\Broker\QuotationController::class, "next"])->name("broker.quotation.next");
        });
        Route::resource("discount", \App\Http\Controllers\Broker\DiscountController::class)->names("broker.discount");
    });
    Route::prefix("underwriting")->group(function () {
        Route::prefix("quotation")->group(function () {
            Route::get("review", [\App\Http\Controllers\Underwriting\QuotationController::class, "review"])->name("underwriting.quotation.review");
            Route::get("reject/{id}", [\App\Http\Controllers\Underwriting\QuotationController::class, "reject"])->name("underwriting.quotation.reject");
            Route::get("accept/{id}", [\App\Http\Controllers\Underwriting\QuotationController::class, "accept"])->name("underwriting.quotation.accept");
        });
    });
    Route::prefix("policy")->group(function () {
        Route::prefix("quotation")->group(function () {
            Route::get("review", [\App\Http\Controllers\Policy\QuotationController::class, "review"])->name("policy.quotation.review");
            Route::get("delete/{id}", [\App\Http\Controllers\Policy\QuotationController::class, "delete"])->name("policy.quotation.delete");
            Route::get("issue/{id}", [\App\Http\Controllers\Policy\QuotationController::class, "issue"])->name("policy.quotation.issue");
        });
    });
});
