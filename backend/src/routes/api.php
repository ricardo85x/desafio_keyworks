<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// List tasks
Route::get('tasks', [TaskController::class, 'index']);

// List single task
Route::get('task/{id}', [TaskController::class, 'show']);

// Create new task
Route::post('task', [TaskController::class, 'store']);

// change task order
Route::post('task-order/{id}', [TaskController::class, 'updateOrder']);

// Update task
Route::patch('task/{id}', [TaskController::class, 'update']);

// Delete task
Route::delete('task/{id}', [TaskController::class,'destroy']);