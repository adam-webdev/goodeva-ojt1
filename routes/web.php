<?php

use App\Http\Controllers\PengeluaranController;
use App\Models\Pengeluaran;
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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('/pengeluaran', PengeluaranController::class);
    Route::get('/pengeluaran/hapus/{id}', [PengeluaranController::class, 'destroy']);
    Route::get('/dashboard', [PengeluaranController::class, 'index']);
});