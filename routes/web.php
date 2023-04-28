<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CbtController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\BankSoalController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post('/postinsert', [NilaiController::class, 'ajaxRequestPost'])->name('postinsert');

Route::resource('mapel', MapelController::class);
Route::resource('ujian', UjianController::class);
Route::resource('soal', BankSoalController::class);
Route::resource('cbt', CbtController::class);
Route::resource('nilai', NilaiController::class);


Route::get('detail/{idUjian}', [CbtController::class, 'soal']);
Route::get('mepel', [MapelController::class, 'index'])->name('boha');

require __DIR__ . '/auth.php';
