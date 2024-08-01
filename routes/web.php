<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController as ClientProductController;
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
    return view('client.index');
})->name('home');


Route::get('category/{id}', [CategoryController::class, 'show'])->name('client.category');
Route::get('products', [ClientProductController::class, 'index'])->name('client.products');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','checkRoleLogin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
        Route::resource('products', ProductController::class);
    });
});



require __DIR__.'/auth.php';