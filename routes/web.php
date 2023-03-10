<?php

use App\Http\Controller\TaskController;
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

Route::prefix('task')->group(function () {
    Route::get('/show_tasks', [TaskController::class, 'showTasks']);
    Route::get('/show_task/{id}', [TaskController::class, 'show']);
    Route::post('/create_task', [TaskController::class, 'createTask']);
    Route::put('/update_task/{id}', [TaskController::class, 'updateTask']);

    // NOTE: lanjutkan tugas assignment di routing baru dibawah ini
    Route::delete('/delete_task/{id}', [TaskController::class, 'deleteTask']);
    Route::post('/assign_task/{id}', [TaskController::class, 'assignTask']);
    Route::put('/unassign_task/{id}', [TaskController::class, 'unassignTask']);
    Route::post('/create_subtask/{id}', [TaskController::class, 'addSubtask']);
    Route::delete('/delete_subtask', [TaskController::class, 'deleteSubtask']);
});
