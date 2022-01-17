<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReferenceController;
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
Route::get('/domain', [DomainController::class, 'showAll'])->name('domains');
Route::get('/practice/{id}', [PracticeController::class, 'show'])->name('practice');

Route::resource('reference', ReferenceController::class);

Route::get('/redirects', function () {
    return redirect()->route('homepage');
});

require __DIR__ . '/auth.php';
