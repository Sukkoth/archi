<?php

use App\Http\Controllers\AdminControllers\BusinessSettingController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProjectController;
use App\Models\Category;
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
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::post('/update/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('fetch_projects', 'fetchProjects')->name('admin.fetchProjects');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::post('/delete/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    });
});

Route::view('sign-in', 'admin.auth.signin');
