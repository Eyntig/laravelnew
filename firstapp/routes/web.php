<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/cars', function () {
    return view('cars');
});

Route::name('more.')->group(function () {
    Route::get('/services', function () {
        return view('services');
    })->name('services');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/faq', function () {
        return view('faq');
    })->name('faq');
});

Route::controller(AuthenController::class)->group(function(){
    Route::get('/registration','registration')->middleware('alreadyLoggedIn');
    Route::post('/registration-user','registerUser')->name('register-user');
    Route::get('/login','login')->middleware('alreadyLoggedIn');
    Route::post('/login-user','loginUser')->name('login-user');
    Route::get('/dashboard','dashboard')->middleware('isLoggedIn');
    Route::get('/logout','logout');
});