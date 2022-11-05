<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProjectController;
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

Route::view('/', 'index')->name('/');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');
Route::view('services', 'services')->name('services');
Route::get('projects', [ProjectController::class, 'index'])->name('projects');
Route::get('view_project/{project}', [ProjectController::class, 'show'])->name('view_project');
Route::get('appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');