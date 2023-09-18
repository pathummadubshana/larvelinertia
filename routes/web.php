<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentControler;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/student/',[StudentControler::class, 'index'])->name('student.index');
Route::get('/student/register',[StudentControler::class, 'register'])->name('student.register');
Route::get('/student/index',[StudentControler::class, 'back'])->name('student.index');
Route::post('/student',[StudentControler::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit',[StudentControler::class, 'edit'])->name('student.edit');
Route::delete('/student/{student}',[StudentControler::class, 'distroy'])->name('student.distroy');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
