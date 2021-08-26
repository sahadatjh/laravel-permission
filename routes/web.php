<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\Auth\LoginController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    // Route::resource('roles', RolesController::class, ['names' => 'admin.roles']);
    Route::get('roles', [RolesController::class, 'index'])->name('roles.list');
    Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('roles/update/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::get('roles/delete/{id}', [RolesController::class, 'destroy'])->name('roles.delete');

    //admin route
    Route::get('admins', [AdminsController::class, 'index'])->name('admins.index');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admins.create');
    Route::post('admins', [AdminsController::class, 'store'])->name('admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admins.edit');
    Route::post('admins/update/{id}', [AdminsController::class, 'update'])->name('admins.update');
    Route::get('admins/delete/{id}', [AdminsController::class, 'destroy'])->name('admins.delete');

    //users route
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');

    //Login Route
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');

    //Logout Route
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');

    //Forget Route
    Route::get('/password/reset', [LoginController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset/submit', [LoginController::class, 'reset'])->name('admin.password.update');


    //category route
    Route::get('categorys', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
});
