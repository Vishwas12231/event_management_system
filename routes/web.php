<?php

use App\Http\Controllers\Admin\EventAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/events', [EventAdminController::class, 'index'])->name('admin.events');
Route::get('/admin/events/create', [EventAdminController::class, 'create']);
Route::post('/admin/events', [EventAdminController::class, 'store']);
Route::get('/admin/events/{id}/edit', [EventAdminController::class, 'edit']);
Route::put('/admin/events/{id}', [EventAdminController::class, 'update']);
Route::delete('/admin/events/{id}', [EventAdminController::class, 'destroy']);
