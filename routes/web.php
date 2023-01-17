<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FitnessPostsController;
use App\Http\Controllers\GuidedWorkoutsController;
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

Route::middleware(['admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('admin/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('admin/usersRecord', 'usersRecord')->name('usersRecord');
        Route::post('admin/updateStatus', 'updateStatus')->name('admin.users.updateStatus');
        Route::delete('admin/users/{id}', 'userDelete')->name('admin.users.delete');
    });
    Route::resource('fitness-posts', FitnessPostsController::class);
    Route::resource('guided-workouts', GuidedWorkoutsController::class);
});

Route::get('blog/post', [FitnessPostsController::class, 'blogPost'])->name('blog.post');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(UserController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register/create', 'create')->name('register.create');
    Route::get('login', 'login')->name('login');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('logout', 'logout')->name('logout');
    Route::get('user/edit', 'edit')->name('user.edit');
    Route::post('user/update', 'update')->name('user.update');
 

});