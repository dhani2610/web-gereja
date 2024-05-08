<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DataJemaatController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\JadwalIbadahController;
use App\Http\Controllers\ProfilePengurusController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\WartaJemaatController;
use App\Models\WartaJemaat;
use Illuminate\Support\Facades\Auth;
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

// Route for the home page
// Route::get('/', [HomeController::class, 'index'])->name('home');




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('pengurus', [HomeController::class, 'pengurus'])->name('pengurus');
Route::get('gallery', [HomeController::class, 'galery'])->name('gallery');
Route::get('jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('jemaat', [HomeController::class, 'jemaat'])->name('jemaat');
Route::get('daftar-donasi', [HomeController::class, 'donasi'])->name('daftar-donasi');
Route::get('warta-online', [HomeController::class, 'warta'])->name('warta-online');

// Group of routes that require authentication
Route::group(['middleware' => 'auth'], function () {

	Route::get('/login', function () {
		if (Auth::user()) {
			return redirect('/login');
		}
	
	})->name('dashboard');

	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
	
	Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
	Route::post('/galery-store', [GaleryController::class, 'store'])->name('galery-store');
	Route::post('/galery-update/{id}', [GaleryController::class, 'update'])->name('galery-update');
	Route::get('/galery-delete/{id}', [GaleryController::class, 'destroy'])->name('galery-delete');
	
	Route::get('/slider', [SliderController::class, 'index'])->name('slider');
	Route::post('/slider-store', [SliderController::class, 'store'])->name('slider-store');
	Route::post('/slider-update/{id}', [SliderController::class, 'update'])->name('slider-update');
	Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider-delete');

	Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
	Route::post('/donasi-store', [DonasiController::class, 'store'])->name('donasi-store');
	Route::post('/donasi-update/{id}', [DonasiController::class, 'update'])->name('donasi-update');
	Route::get('/donasi-delete/{id}', [DonasiController::class, 'destroy'])->name('donasi-delete');

	Route::get('/warta-jemaat', [WartaJemaatController    ::class, 'index'])->name('warta-jemaat');
	Route::post('/warta-jemaat-store', [WartaJemaatController ::class, 'store'])->name('warta-jemaat-store');
	Route::post('/warta-jemaat-update/{id}', [WartaJemaatController   ::class, 'update'])->name('warta-jemaat-update');
	Route::get('/warta-jemaat-delete/{id}', [WartaJemaatController    ::class, 'destroy'])->name('warta-jemaat-delete');
    
	Route::get('/faq', [FaqController::class, 'index'])->name('faq');
	Route::post('/faq-store', [FaqController::class, 'store'])->name('faq-store');
	Route::post('/faq-update/{id}', [FaqController::class, 'update'])->name('faq-update');
	Route::get('/faq-delete/{id}', [FaqController::class, 'destroy'])->name('faq-delete');
    
	Route::get('/jadwal-ibadah', [JadwalIbadahController::class, 'index'])->name('jadwal-ibadah');
	Route::post('/jadwal-ibadah-store', [JadwalIbadahController::class, 'store'])->name('jadwal-ibadah-store');
	Route::post('/jadwal-ibadah-update/{id}', [JadwalIbadahController::class, 'update'])->name('jadwal-ibadah-update');
	Route::get('/jadwal-ibadah-delete/{id}', [JadwalIbadahController::class, 'destroy'])->name('jadwal-ibadah-delete');
    
	Route::get('/data-jemaat', [DataJemaatController::class, 'index'])->name('data-jemaat');
	Route::post('/data-jemaat-store', [DataJemaatController::class, 'store'])->name('data-jemaat-store');
	Route::post('/data-jemaat-update/{id}', [DataJemaatController::class, 'update'])->name('data-jemaat-update');
	Route::get('/data-jemaat-delete/{id}', [DataJemaatController::class, 'destroy'])->name('data-jemaat-delete');
    
	Route::get('/profile-pengurus', [ProfilePengurusController::class, 'index'])->name('profile-pengurus');
	Route::post('/profile-pengurus-store', [ProfilePengurusController::class, 'store'])->name('profile-pengurus-store');
	Route::post('/profile-pengurus-update/{id}', [ProfilePengurusController::class, 'update'])->name('profile-pengurus-update');
	Route::get('/profile-pengurus-delete/{id}', [ProfilePengurusController::class, 'destroy'])->name('profile-pengurus-delete');

	Route::get('/about', [AboutController::class, 'index'])->name('about');
	Route::post('/about-store', [AboutController::class, 'store'])->name('about-store');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-management', [InfoUserController::class, 'userManagement'])->name('user-management');
	Route::post('/tambah-user', [InfoUserController::class, 'tambahUser'])->name('tambah-user');
	Route::post('/update-user/{id}', [InfoUserController::class, 'updateUser'])->name('update-user');
	Route::get('/delete-user/{id}', [InfoUserController::class, 'deleteUser'])->name('delete-user');
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        if (Auth::user()) {
            return redirect('/login');
        }

    })->name('dashboard');

    // Route for the dashboard page
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Group of routes for the testimonial feature
    Route::prefix('testimoni')->group(function () {
        Route::get('/', [TestimoniController::class, 'index'])->name('testimoni');
        Route::post('/store', [TestimoniController::class, 'store'])->name('testimoni-store');
        Route::post('/update/{id}', [TestimoniController::class, 'update'])->name('testimoni-update');
        Route::get('/delete/{id}', [TestimoniController::class, 'destroy'])->name('testimoni-delete');
    });

    // Group of routes for the gallery feature
    Route::prefix('galery')->group(function () {
        Route::get('/', [GaleryController::class, 'index'])->name('galery');
        Route::post('/store', [GaleryController::class, 'store'])->name('galery-store');
        Route::post('/update/{id}', [GaleryController::class, 'update'])->name('galery-update');
        Route::get('/delete/{id}', [GaleryController::class, 'destroy'])->name('galery-delete');
    });

    // Group of routes for the category feature
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::post('/store', [CategoryController::class, 'store'])->name('category-store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category-update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');
    });

    // Group of routes for the opening hours feature
    Route::prefix('jam-buka')->group(function () {
        Route::get('/', [JamBukaController::class, 'index'])->name('jam-buka');
        Route::post('/store', [JamBukaController::class, 'store'])->name('jam-buka-store');
        Route::post('/update/{id}', [JamBukaController::class, 'update'])->name('jam-buka-update');
        Route::get('/delete/{id}', [JamBukaController::class, 'destroy'])->name('jam-buka-delete');
    });

    // Group of routes for the menu feature
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu');
        Route::post('/store', [MenuController::class, 'store'])->name('menu-store');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menu-update');
        Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name('menu-delete');
    });

    // Route for the logout feature
    Route::get('/logout', [SessionsController::class, 'destroy']);

    // Group of routes for the user management feature
    Route::get('/user-management', [InfoUserController::class, 'userManagement'])->name('user-management');
    Route::post('/tambah-user', [InfoUserController::class, 'tambahUser'])->name('tambah-user');
    Route::post('/update-user/{id}', [InfoUserController::class, 'updateUser'])->name('update-user');
    Route::get('/delete-user/{id}', [InfoUserController::class, 'deleteUser'])->name('delete-user');
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);

    // Route for the sign up page
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
});

// Group of routes that do not require authentication
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login-post', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

// Route for the login page
Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
