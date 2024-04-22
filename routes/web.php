<?php

use App\Http\Controllers\EmployeeController;
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


Route::view('/welcome',  'welcome')->name('welcome');

// Route::view('/index',  'employee.index')->name('index');

Route::get('/index',                [EmployeeController::class,  'index'])->name('employee.index');

Route::get('/create',               [EmployeeController::class,  'create'])->name('employee.create');

Route::delete('/index/{id}',        [EmployeeController::class,  'destroy'])->name('employee.destroy');

Route::post('/create',              [EmployeeController::class,  'store'])->name('employee.store');

Route::get('/index/{id}/edit',      [EmployeeController::class,  'edit'])->name('employee.edit');

Route::put('/index/{id}/edit',      [EmployeeController::class,  'update'])->name('employee.update');
