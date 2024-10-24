<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('plans/{id}/edit', [App\Http\Controllers\Admin\PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{id}/update', [App\Http\Controllers\Admin\PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/create', [App\Http\Controllers\Admin\PlanController::class, 'create'])->name('plans.create');
    Route::post('plans/store', [App\Http\Controllers\Admin\PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [App\Http\Controllers\Admin\PlanController::class, 'index'])->name('plans.index');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
