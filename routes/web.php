<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GalleryController, UserController, PesanController, AboutController, NewsController, ContactController, HomeController, AuthController};

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

Route::get('/', [UserController::class, 'home']);
Route::get('/homes', [UserController::class, 'home']);

Route::get('/about', [UserController::class, 'about']);

Route::get('/news', [UserController::class, 'news']);

Route::get('/gallery', [UserController::class, 'gallery']);

Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/contact', [UserController::class, 'pesan']);

Route::get('/layouts', [UserController::class, 'contactUs']);

// ROUTE ADMIN LOGIN
Route::get('/admin', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('/admin/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
 
});

// ROUTE ADMIN DASHBOARD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// ROUTE ADMIN HOME
Route::get('/admin/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/admin/home/{id}', [HomeController::class, 'edit'])->name('home.edit');
Route::put('/admin/home/{id}', [HomeController::class, 'update'])->name('home.update');
Route::post('/admin/home', [HomeController::class, 'store'])->name('home.store');
Route::delete('/admin/home/{id}', [HomeController::class, 'destroy'])->name('home.delete');

// ROUTE ADMIN GALLERY
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get ('/admin/gallery/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/admin/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');

// ROUTE ADMIN PESAN
Route::get('/admin/pesan', [PesanController::class, 'index'])->name('pesan.index');
Route::delete('/admin/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.delete');

// ROUTE ADMIN ABOUT
Route::get('/admin/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/admin/about/{id}', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
Route::post('/admin/about', [AboutController::class, 'store'])->name('about.store');
Route::delete('/admin/about/{id}', [AboutController::class, 'destroy'])->name('about.delete');

// ROUTE ADMIN NEWS
Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/admin/news/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.delete');

// ROUTE ADMIN CONTACT
Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/admin/contact/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/admin/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::post('/admin/contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/admin/contact/{id}', [ContactController::class, 'destroy'])->name('contact.delete');