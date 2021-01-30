<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dhaka', function () {
        return view('dhaka.dhaka');
    })->name('/dhaka');
    Route::get('/user-list', function () {
        return view('user.user');
    })->name('/user');
    Route::get('/settings', function () {
        return view('settings.setting');
    })->name('/settings');
    Route::resource('/role',RoleController::class);
    Route::resource('/user',UserController::class);

});



