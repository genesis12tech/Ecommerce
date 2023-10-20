<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
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

// Route::get('/', function () {
// 	return view('frontend.index');
// });

Route::middleware('admin:admin')->group(function () {
	Route::get('admin/login', [AdminController::class, 'loginForm']);
	Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
	Route::get('/admin/dashboard', function () {
		return view('admin.index');
	})->name('dashboard')->middleware('auth:admin');
});

// Admin Route

Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
});

// User Route

Route::get('/', [IndexController::class, 'Index'])->name('home');
