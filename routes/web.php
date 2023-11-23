<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;




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
})->name('home');
/*
|--------------------------------------------------------------------------|
|                            Admin  All Routes                             |
|--------------------------------------------------------------------------|
*/
Route::controller(AdminController::class)->group(function () {
    Route::get('/change/password', 'change_password')->name('change.password');
    Route::post('/pass/updateword', 'update_password')->name('update.password');

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
/*
|--------------------------------------------------------------------------|
|                             About All Routes                             |
|--------------------------------------------------------------------------|
*/
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/page', 'UpdatePage')->name('update.page');
    Route::get('/about', 'HomeAbout')->name('home.about');

    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');

    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});

/*
|--------------------------------------------------------------------------|
|                             Portfolio All Routes                             |
|--------------------------------------------------------------------------|
*/

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/view/portfolio', 'ViewPortfolio')->name('view.portfolio'); //video te route name chilo all.portfolio
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');

    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');


    Route::get('/portfolio/detail/{id}', 'PortfolioDetail')->name('portfolio.details');
});
/*
|--------------------------------------------------------------------------|
|                             Blog Category Routes                             |
|--------------------------------------------------------------------------|
*/

Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreCategory')->name('store.blog.category');

    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});
/*
|--------------------------------------------------------------------------|
|                             Blog Routes                             |
|--------------------------------------------------------------------------|
*/

Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'allBlog')->name('all.blog');
    Route::get('/add/blog', 'addBlog')->name('add.blog');
    Route::post('/store/blog', 'storeBlog')->name('store.blog');

    Route::get('/blog/edit/{id}', 'editBlog')->name('blog.edit');
    Route::post('/blog/update', 'updateBlog')->name('blog.update');
    Route::get('/blog/delete/{id}', 'deleteBlog')->name('blog.delete');
});

/*
|--------------------------------------------------------------------------|
|                             Dashboard All Routes                             |
|--------------------------------------------------------------------------|
*/

Route::get('/dashboard', function () {
    return view('admin.index');
    //added 'auth' and 'verified' middleware
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
