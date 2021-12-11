<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;

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
Route::group(['prefix' => 'testimonial' ,'as' => 'testimonial.'], function () {
    Route::get('/index', [TestimonialController::class, 'index'])->name('index');
    Route::get('/create', [TestimonialController::class, 'create'])->name('create');
    Route::post('/store', [TestimonialController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [TestimonialController::class, 'destroy'])->name('delete');
});
Route::group(['prefix' => 'faq' ,'as' => 'faq.'], function () {
    Route::get('/index', [FaqController::class, 'index'])->name('index');
    Route::get('/create', [FaqController::class, 'create'])->name('create');
    Route::post('/store', [FaqController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [FaqController::class, 'show'])->name('show');
    Route::post('/update/{id}', [FaqController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [FaqController::class, 'destroy'])->name('delete');
});
Route::get('/js', function () {
    return view('learn-js');
});

// Learning laravel 
Route::get('/blog/{id}',function($number){
    return ('Blog Post') .$number;
})->where([
    $id = '[0-9]+'
]);


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');