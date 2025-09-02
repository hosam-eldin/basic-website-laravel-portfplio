<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MultiImagesController;
use GuzzleHttp\Psr7\Request;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index', [
        'user' => Auth::user()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::post('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/profile/edit', 'editProfile')->name('admin.profile.edit');
    Route::post('/admin/profile/update', 'updateProfile')->name('admin.profile.update');
    Route::get('/admin/editPassword', 'editPassword')->name('admin.edit.password');
    Route::post('/admin/profile/changePassword', 'changePassword')->name('admin.change.password');
})->middleware(['auth']);

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('home/slider', 'homeSlider')->name('home.slide');
    Route::post('home/slider/update', 'homeSliderUpdate')->name('home.slide.update');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('about', 'about')->name('about');
    Route::get('admin/about', 'adminAbout')->name('about.slide');
    Route::post('about/update', 'aboutUpdate')->name('about.update');
});

Route::controller(MultiImagesController::class)->group(function () {
    Route::get('multi/images', 'index')->name('multi.images');
    Route::post('multi/images/store', 'store')->name('store.multi.images');
    Route::get('multi/images/store', 'allMultiImages')->name('all.multi.images');
    Route::get('edit/multi/images/{id}', 'edit')->name('edit.multi.images');
    Route::post('edit/multi/images/{id}', 'update')->name('update.multi.images');
    Route::get('delete/multi/images/{id}', 'delete')->name('delete.multi.images');
});

require __DIR__ . '/auth.php';
