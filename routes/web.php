<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpinionController;
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
Route::get('/practice', [PracticeController::class, 'index'])->name('practice.index');
Route::resource('reference', ReferenceController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/publish/{id}', [PracticeController::class, 'publish'])->name('practice.publish');
    Route::post('/add-opinion-response/{id}', [OpinionController::class, 'storeUserOpinion'])->name('opinion.storeUserOpinion');
});


Route::get('/redirects', function () {
    return redirect()->route('homepage');
});

require __DIR__ . '/auth.php';
