<?php

use Illuminate\Support\Facades\Route;

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
    return view('attendance');
});
Route::get('/list',[\App\Http\Controllers\AttendanceController::class,'list'])->name('sore.list');
Route::post('/store',[\App\Http\Controllers\AttendanceController::class,'store'])->name('sore.data');
Route::get('/edit/{id}',[\App\Http\Controllers\AttendanceController::class,'edit'])->name('sore.edit');
Route::post('/update/{id}',[\App\Http\Controllers\AttendanceController::class,'update'])->name('sore.update');
Route::get('/search',[\App\Http\Controllers\AttendanceController::class,'searchByEmpId'])->name('sore.search');
