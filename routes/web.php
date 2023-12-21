<?php
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ItempesananController;
use App\Http\Controllers\Admin\DashboardController;
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
    return view('auth.login');
});

//group route untuk admin
Route::prefix('admin')->group(function () {
    //route untuk auth
    Route::group(['middleware' => 'auth'], function () {
        // buat route untuk dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        // buat route untuk data menu
        Route::resource('/menu', MenuController::class, ['as' => 'admin']);
        // buat route untuk data pelanggan 
        Route::resource('/pelanggan', PelangganController::class, ['as' => 'admin']);
        // buat route untuk data pesanan
        Route::resource('/pesanan', PesananController::class, ['as' => 'admin']);
        // buat route untuk data item pesanan
        Route::resource('/itempesanan', ItempesananController::class, ['as' => 'admin']);

    });
});