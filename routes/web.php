<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tasks/completed', [TaskController::class, 'show_completed'])->name('tasks.completed');
Route::get('/tasks/incomplete', [TaskController::class, 'show_incomplete'])->name('tasks.incomplete');
Route::put('/tasks/{id}/status/{status}', [TaskController::class, 'set_status'])->name('tasks.set');
Route::resource('tasks', TaskController::class);
