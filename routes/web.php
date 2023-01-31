<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FitnessPostsController;
use App\Http\Controllers\GuidedWorkoutsController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutPlansController;
use App\Http\Controllers\EquipmentController;
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
    Route::controller(ExerciseController::class)->name('exercise.')->group(function () {
        Route::get('exercise', 'index')->name('index');
        Route::get('exercise/create', 'create')->name('create');
        Route::post('exercise/insert', 'insert')->name('insert');
        Route::delete('exerciseDelete/{id}', 'delete')->name('delete');
        Route::get('exercise/edit/{id}', 'edit')->name('edit');
        Route::post('exercise/update/{id}', 'update')->name('update');
        Route::get('exercise/seconds', 'ExerciseSecondsindex')->name('seconds');
        Route::post('exercise/seconds/insert', 'ExSecondsInsert')->name('secondsInsert');
        Route::delete('secondsDelete/{id}', 'ExerciseSecondsdelete')->name('secondsDelete');
        Route::post('exercise/secondsEdit/{id}', 'secondsEdit')->name('secondsEdit');
        Route::put('exercise/secondsUpdate/{id}', 'secondsUpdate')->name('secondsUpdate');
        
    });

    Route::controller(WorkoutPlansController::class)->name('workoutPlans.')->group(function () {
        Route::get('workoutPlans', 'index')->name('index');
        Route::get('workoutPlans/create', 'create')->name('create');
        Route::post('workoutPlans/insert', 'insert')->name('insert');
        Route::get('workoutPlans/edit/{id}', 'edit')->name('plansEdit');
        Route::post('workoutPlans/{id}', 'update')->name('plansUpdate');
        Route::delete('workoutPlans/{id}', 'destroy')->name('plansDestroy');
    });

    // Equipment routes here Start
    Route::resource('equipment', EquipmentController::class);
    // Equipment routes here End

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
