<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ShowPractice;
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
