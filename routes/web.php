<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubgalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

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


//Front End Routes
Route::get('/', [FrontendController::class, 'home']);
Route::get('/news', [FrontendController::class, 'news']);
Route::get('/news/{slug}', [FrontendController::class, 'news_page']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/category/{slug}', [FrontendController::class, 'category_page']);
Route::get('/gallery', [FrontendController::class, 'gallery']);
Route::get('/gallery/{id}', [FrontendController::class, 'gallery_page']);

Route::get('/about-us', [FrontendController::class, 'about_us']);




Auth::routes();
// Back End Routes

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', IsAdminMiddleware::class]], function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    //About Us Routes
    Route::get('abouts', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('abouts', [AboutController::class, 'store'])->name('abouts.store');

    //Banner routes
    Route::resource('banners', BannerController::class);
    Route::post('banners/updateOrder', [BannerController::class, 'updateOrder'])->name('banner.updateOrder');


    //Category routes
    Route::resource('categories', CategoryController::class);
    Route::post('categories/updateOrder', [CategoryController::class, 'updateOrder'])->name('category.updateOrder');

    //Gallery route
    Route::resource('galleries', GalleryController::class);
    Route::post('galleries/updateOrder', [GalleryController::class, 'updateOrder'])->name('gallery.updateOrder');

    //Menu routes
    Route::resource('menus', MenuController::class);
    Route::post('menus/updateOrder', [MenuController::class, 'updateOrder'])->name('menu.updateOrder');

    //Page routes
    Route::resource('pages', PageController::class);
    Route::post('pages/updateOrder', [PageController::class, 'updateOrder'])->name('page.updateOrder');

    //SubGallery routes
    Route::get('subgalleries/{gallery}/create', [SubgalleryController::class, 'create'])->name('subgalleries.create');
    Route::post('subgalleries', [SubgalleryController::class, 'store'])->name('subgalleries.store');
    Route::delete('subgalleries/{subgallery}', [SubgalleryController::class, 'delete'])->name('subgalleries.destroy');

    //Setting routes
    Route::get('settings', [SettingController::class, 'create'])->name('settings.create');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');

    //User route
    Route::resource('users', UserController::class);
});

//change status routes
Route::get('categories/changeStatus', [CategoryController::class, 'changeStatus'])->name('categories.changeStatus');
Route::get('banners/changeStatus', [BannerController::class, 'changeStatus'])->name('banners.changeStatus');
Route::get('galleries/changeStatus', [GalleryController::class, 'changeStatus'])->name('galleries.changeStatus');
Route::get('menus/changeStatus', [MenuController::class, 'changeStatus'])->name('menus.changeStatus');
Route::get('pages/changeStatus', [PageController::class, 'changeStatus'])->name('pages.changeStatus');
