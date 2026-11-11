
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ReigesterController;
use App\Http\Controllers\LoginController;


// Register
Route::get('/', [ReigesterController::class, 'index'])
    ->name('register');

Route::post('/register', [ReigesterController::class, 'store'])
    ->name('register.store');


// Login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');


// Protected Routes
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // Home
    Route::get('/home', [PortfolioController::class, 'home'])
        ->name('home');

    // Portfolio
    Route::get('/portfolio/projects', [PortfolioController::class, 'projects'])
        ->name('portfolio.projects');

    Route::get('/contact', [PortfolioController::class, 'contact'])
        ->name('portfolio.contact');


    // Projects CRUD
    Route::resource('projects', ProjectsController::class);

});
