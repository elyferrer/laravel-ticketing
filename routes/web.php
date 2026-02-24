<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth', 'admin'])->prefix('/projects')->name('projects.')->group(function() {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/', [ProjectController::class, 'store'])->name('store');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::patch('/{project}', [ProjectController::class, 'update'])->name('update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
});

Route::prefix('/tickets')->name('tickets.')->group(function() {
    Route::get('/', [TicketController::class, 'projects'])->name('project.index');
    Route::get('/{project}', [TicketController::class, 'index'])->name('index');
    Route::get('/{project}/create', [TicketController::class, 'create'])->name('create');
    Route::post('/{project}', [TicketController::class, 'store'])->name('store');
    Route::get('/{project}/{ticket}', [TicketController::class, 'show'])->name('show')->can('view', 'ticket');
    Route::get('/{project}/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
    Route::patch('/{project}/{ticket}', [TicketController::class, 'update'])->name('update');
    Route::delete('/{project}/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
})->middleware('auth');

Route::get('test-email', function() {
    return view('emails.ticket-assignment');
});