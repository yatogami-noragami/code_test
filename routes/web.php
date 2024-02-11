<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

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

Route::redirect('/', 'category/list');

Route::group(['prefix' => 'category'], function () {
    Route::get('list', [CategoryController::class, 'list'])->name('category#list');
    Route::get('createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
    Route::post('create', [CategoryController::class, 'create'])->name('category#create');
    Route::get('viewPage/{id}', [CategoryController::class, 'viewPage'])->name('category#viewPage');
    Route::get('editPage/{id}', [CategoryController::class, 'editPage'])->name('category#editPage');
    Route::post('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
    Route::post('editFast/{id}', [CategoryController::class, 'editFast'])->name('category#editFast');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
});

Route::group(['prefix' => 'item'], function () {
    Route::get('list', [ItemController::class, 'list'])->name('item#list');
    Route::get('createPage', [ItemController::class, 'createPage'])->name('item#createPage');
    Route::post('create', [ItemController::class, 'create'])->name('item#create');
    Route::get('viewPage/{id}', [ItemController::class, 'viewPage'])->name('item#viewPage');
    Route::get('editPage/{id}', [ItemController::class, 'editPage'])->name('item#editPage');
    Route::post('edit/{id}', [ItemController::class, 'edit'])->name('item#edit');
    Route::post('editFast/{id}', [ItemController::class, 'editFast'])->name('item#editFast');
    Route::get('delete/{id}', [ItemController::class, 'delete'])->name('item#delete');
});
