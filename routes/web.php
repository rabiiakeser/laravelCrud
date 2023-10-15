<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
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
    return view('pages.birkereikiuc');
})->name('index');

Route::get('/tables', function () {
    return view('pages.tables');
})->name('tables');



// Route::get('/profile', function () {
//     return view('pages.profile');
// })->name('profile');



Route::prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
});

Route::prefix('authors')->group(function(){
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
    Route::get('/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::delete('/destroy/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
    Route::put('/update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::post('/', [AuthorController::class, 'store'])->name('author.store');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';
