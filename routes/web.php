<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
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

Route::get('/', [HomeController::class, 'show'])->name('homepage');
Route::get('/domain/{slug}', [DomainController::class, 'show'])->name('domain');
Route::get('/domain/', [DomainController::class, 'showAll'])->name('domains');
Route::get('/practice/{id}', [PracticeController::class, 'show'])->name('practice');

Route::get('/redirects', function () {
    return redirect()->route('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
