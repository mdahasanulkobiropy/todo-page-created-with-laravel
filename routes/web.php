<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ThemeToggoleController;
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

Route::get('/',[FrontendController::class,'index'])->name('index.frontend');

Route::post('/addtag', [TagController::class, 'store'])->name('store.tag');


//task part route start
Route::post('/addtask', [TaskController::class, 'store'])->name('store.task');
Route::post('/updatetask/{id}', [TaskController::class, 'update'])->name('update.task');
Route::get('/deletetask/{id}', [TaskController::class, 'delete'])->name('delete.task');
Route::get('/forcedeletetask/{id}', [TaskController::class, 'forcedelete'])->name('forcedelete.task');
Route::get('/restoretask/{id}', [TaskController::class, 'restore'])->name('restore.task');
Route::get('/completetask/{id}', [TaskController::class, 'complete'])->name('complete.task');
Route::get('/incompletetask/{id}', [TaskController::class, 'incomplete'])->name('incomplete.task');
Route::get('/importanttask/{id}', [TaskController::class, 'important'])->name('important.task');
Route::get('/unimportanttask/{id}', [TaskController::class, 'unimportant'])->name('unimportant.task');


//ThemeToggole part route part
Route::get('/themesatutstrue/{id}',[ThemeToggoleController::class,'themesatutstrue'])->name('themesatutstrue.theme');
Route::get('/themesatutsfalse/{id}',[ThemeToggoleController::class,'themesatutsfalse'])->name('themesatutsfalse.theme');
