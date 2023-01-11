<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminControllers\BusinessSettingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WebController;
use App\Models\Project;
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




Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
    Route::get('services', 'services')->name('services');
    ROute::view('heart', 'heart');
    Route::view('love', 'love');
});


Route::get('projects', [ProjectController::class, 'index'])->name('projects');
Route::get('view_project/{project}', [ProjectController::class, 'show'])->name('view_project');
Route::get('appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('appointment/show', [AppointmentController::class, 'show'])->name('appointment.show');
Route::post('appointment/delete', [AppointmentController::class, 'delete'])->name('appointment.delete');

Route::get('businessSettings', [BusinessSettingController::class, 'index'])->name('businessSettings');


