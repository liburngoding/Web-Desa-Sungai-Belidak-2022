<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardMaritalController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPasswordController;
use App\Http\Controllers\DashboardVillagerController;
use App\Http\Controllers\DashboardProfessionController;
use App\Http\Controllers\DashboardUserProfileController;
use App\Http\Controllers\DashboardUserManagementController;



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
//! Throttle diambil dari RateLimiter yang ada di dalam file RouteServiceProvider.php
//* Saat ini pembatas pengunjung adalah 60x kunjungan/menit kalau sudah login
//* Saat ini pembatas pengunjung adalah 15x kunjungan/menit kalau belum login
Route::middleware(['throttle:pembatasPengunjung'])->group(function () {
    Route::group([['prefix' => '']], function () {
        $categories = Category::all();
        Route::view('/', 'home', ['categories' => $categories]);
        Route::view('/visimisi', 'visimisi', ['categories' => $categories]);
        Route::view('/sejarah', 'sejarah', ['categories' => $categories]);
        Route::view('/struktur', 'struktur', ['categories' => $categories]);
        Route::get('/penduduk', [PendudukController::class, 'index']);
        Route::view('/kontak', 'kontak', ['categories' => $categories]);

        Route::get('/posts', [PostController::class, 'index']);
        Route::get('posts/{post:slug}', [PostController::class, 'show']);
        //? kalu cuma {post} berarti id nya, tapi kalau post:slug, berarti slug dari postnya
    });
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login', 'authenticate')->middleware('guest');
        Route::post('/logout', 'logout')->middleware('auth');
    });
    //! auth (semua yang ada dibawah ini harus login)
    Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::prefix('myprofile')->group(function () {
            Route::controller(DashboardUserProfileController::class)->group(function () {
                Route::get('/', 'edit');
                Route::patch('/', 'update');
            });
            Route::controller(DashboardPasswordController::class)->group(function () {
                Route::get('/password', 'edit');
                Route::patch('/password', 'update');
            });
        });
        Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
        Route::get('/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug']);
        Route::resource('/posts', DashboardPostController::class);
        Route::resource('/villagers', DashboardVillagerController::class)->except('show');

        //! admin (semua yang ada di bawah ini hanya bisa diakses admin)
        Route::middleware('admin')->group(function () {
            Route::resource('/professions', DashboardProfessionController::class)->except(['show', 'create']);
            Route::resource('/maritals', DashboardMaritalController::class)->except(['show', 'create']);
            Route::resource('/categories', DashboardCategoryController::class)->except(['show', 'create']);
            Route::resource('/users', DashboardUserManagementController::class)->except(['create', 'show', 'edit']);
        });
    });
});
