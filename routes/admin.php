<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::view('admin', 'admin.index');
Route::view('sign-in', 'admin.auth.signin');