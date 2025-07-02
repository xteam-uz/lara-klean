<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
  Route::get('/', 'main')->name('main');
  Route::get('/about', 'about')->name('about');
  Route::get('/service', 'service')->name('service');
  Route::get('/project', 'project')->name('project');
  Route::get('/contact', 'contact')->name('contact');
});

Route::resources([
  'posts' => PostController::class,
]);

Route::get('users', [UserController::class, 'index']);
