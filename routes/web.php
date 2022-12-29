<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BackupTableController;

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
    return view('welcome');
});

Auth::routes();

// All user routes here
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'deshboard.users.login')->name('login');
        Route::post('/login', [UserController::class, 'doLogin'])->name('doLogin');
        Route::view('/register', 'deshboard.users.register')->name('register');
        Route::post('/register', [UserController::class, 'RegisterCreate'])->name('RegisterCreate');
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::view('/home', 'deshboard.users.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});
// All admin routes here
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'deshboard.admin.login')->name('login');
        Route::post('/login', [AdminController::class, 'doLogin'])->name('doLogin');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'deshboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

//Database Table Backup route here..
Route::get('/tablebackup',[BackupTableController::class,'TableBackup']);
