<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentTaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware(['guest', 'prevent-back']);



Route::middleware(['guest'])->group(function () {

    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

    Route::get('/register', [RegisterController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

    Route::get('reset_password', [PasswordResetController::class, 'resetpasswordForm'])->name('resetpassword');

    Route::get('forgotpassword', [PasswordResetController::class, 'forgotpasswordForm'])->name('forgotpassword');
});


Route::middleware(['auth', 'can:student'])->group(function () {

    Route::get('/student/profile/create', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/student/profile/edit/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/student/profile/create/info', [ProfileController::class, 'store'])->name('profile.store');
});



//task => include the modal and view the task for specific student tasks

Route::prefix('student')->middleware(['auth', 'can:student'])->group(function () {

    Route::post('/task/create', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/mytask', [TaskController::class, 'showTask'])->name('task.showTask');
    Route::delete('/task/mytask/{task}', [TaskController::class, 'deleteTask'])->name('task.delete');
    Route::get('/task/mytask/{task}/edit', [TaskController::class, 'editTask'])->name('taskedit');
    Route::put('/task/mytask/{task}', [TaskController::class, 'updateTask'])->name('taskUpdate');

    //attendance

    Route::get('/attendance', function () {
        return view('student.attendance');
    })->middleware(['auth', 'can:student'])->name('student.attendance');

    Route::get('/', function () {
        return view('welcome');
    })->middleware(['guest', 'prevent-back']);
});


//admin routes
Route::prefix('supervisor')->middleware(['auth', 'can:super', 'prevent-back'])->group(function () {
    Route::get('/student/profile', [ProfileController::class, 'index'])->name('profile.index');


    Route::get('/student/user', [UserController::class, 'index'])->name('user.all_user');
    Route::post('/student/user/{user}/ban', [UserController::class, 'bannuser'])->name('user.banned');

    //dashboard
    Route::get('/admin', [DashboardController::class, 'showList'])->name('admin.dashboard');

    Route::post('/admin/add', [UserController::class, 'addSupervisor'])->name('admin.addsupervisor');

    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    // Route::delete('/admin/users/{user}/delete',[UserController::class,'destroy'])->name('user.delete');

    Route::get('/students/{user}/tasks', [StudentTaskController::class, 'tasksByStudent'])->name('students.tasks');

    Route::get('/student/tasks', [StudentTaskController::class, 'index'])->name('task.index');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::fallback(function () {
    return abort(404);
});
