<?php

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


Route::get('/', [\App\Http\Controllers\ArticleController::class, "index"] 
)->name('dashboard');




// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
//->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('articles',\App\Http\Controllers\ArticleController::class);

Route::resource('joiners',\App\Http\Controllers\JoinerController::class)
    ->except('index')
    ->middleware(['auth', 'verified']);

// 檢視專案時區
// Route::get('/test-time', function () {
//     return date('Y-m-d H:i:s');
// });


require __DIR__.'/auth.php';
