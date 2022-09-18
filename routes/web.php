<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    HomeController,
    SupplierController
};

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


/* ================== ADMIN ROUTES ================== */
Route::group(["prefix" => 'dashboard'], function () {
    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'root'])->name('root');

        //Update User Details
        Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

        Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
        Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');


        //suppliers
        Route::get('suppliers/export', [SupplierController::class, 'export'])->name('suppliers.export');
        Route::post('suppliers/import', [SupplierController::class, 'import'])->name('suppliers.import');
        Route::resource("suppliers", SupplierController::class)->except(['show']);

        //Language Translation
        Route::get('index/{locale}', [HomeController::class, 'lang']);

        //render files inside views/template folder
        Route::get('{any}', [HomeController::class, 'index'])->name('index');
    });
});

/* ================== USER ROUTES ================== */
Route::get('/', function () {
    return view('welcome');
});
