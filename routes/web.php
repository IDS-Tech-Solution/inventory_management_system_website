<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;


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
    return view('frontend.index');
});
/*
|--------------------------------------------------------------------------|
|                            Admin  All Routes                             |
|--------------------------------------------------------------------------|
*/
Route::controller(AdminController::class)->group(function () {
    Route::get('/change/password', 'change_password')->name('change.password');
    Route::post('/update/password', 'update_password')->name('update.password');

    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'edit_profile')->name('edit.profile');
    Route::post('/store/profile', 'store_profile')->name('store.profile');
});


/*
|--------------------------------------------------------------------------|
|                             Home Slide All Routes                             |
|--------------------------------------------------------------------------|
*/

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});



Route::get('/dashboard', function () {
    return view('admin.index');
    //added 'auth' and 'verified' middleware
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
