<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MultiImagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Models\Footer;
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

Route::controller(PortfolioController::class)->group(function () {
    Route::get('portfolio', 'index')->name('portfolio.index');
    Route::get('all/portfolio', 'allPortfolio')->name('all.portfolio');
    Route::get('add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'storePortfolio')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'editPortfolio')->name('edit.portfolio');
    Route::post('Update/portfolio/{id}', 'updatePortfolio')->name('update.portfolio');
    Route::get('delete/portfolio/{id}', 'deletePortfolio')->name('delete.portfolio');
    Route::get('portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');
});

Route::controller(FooterController::class)->group(function () {
    Route::get('footer/setup', 'footerSetup')->name('footer.setup');
    Route::get('footer/show', 'footerShow')->name('footer.show');
    Route::post('footer/store', 'store')->name('store.footer');
    Route::get('footer/edit/{id}', 'edit')->name('edit.footer');
    Route::post('footer/update/{id}', 'update')->name('update.footer');
    Route::get('footer/delete/{id}', 'delete')->name('delete.footer');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact/store', 'store')->name('contact.store');
    Route::get('admin/contact', 'adminContact')->name('admin.contact');
    Route::get('delete/message/{id}', 'deleteMessage')->name('delete.message');
});

require __DIR__ . '/auth.php';
