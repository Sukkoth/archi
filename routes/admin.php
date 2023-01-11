<?php

use App\Http\Controllers\AdminControllers\BusinessSettingController;
use App\Http\Controllers\AdminControllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'admin.index')->name('admin');  

    Route::get('edit-info', [BusinessSettingController::class, 'index'])->name('edit-info');
    Route::post('update_about_company', [BusinessSettingController::class, 'updateAboutCompany'])->name('update_about_company');
    Route::post('update_company_contact', [BusinessSettingController::class, 'update_company_contact'])->name('update_company_contact');
    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.projects');
        Route::get('/show/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('fetch_projects', 'fetchProjects')->name('admin.fetchProjects');
    });

});

Route::view('sign-in', 'admin.auth.signin');