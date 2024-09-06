<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    $tasks = [];
    if (auth()->check()) {
        $tasks = auth()->user()->userTasks()->latest()->get();
    }
    return view('home', ['tasks'=> $tasks]);
})->name('home');



//The name is added to be able to redirect between login and register
Route::get('/login', [UserController::class, 'RedirectLogin'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('login', [UserController::class, 'login']);

Route::get('/editTaskPage/{task}', [TaskController::class, 'editTaskPage'])->name('editTaskPage');
Route::post('/addTask', [TaskController::class, 'addTask']);
Route::put('/editTask/{task}', [TaskController::class, 'editTask']);
Route::delete('/deleteTask/{task}', [TaskController::class, 'deleteTask']);

