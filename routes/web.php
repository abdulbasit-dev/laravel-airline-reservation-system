<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    HomeController,
    AirlineController,
    AirportController,
    PlaneController,
    FlightController,
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


Route::group(["prefix" => 'dashboard'], function () {
    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', [HomeController::class, 'root'])->name('root');
        
        /* ================== USER ROUTES ================== */


        /* ================== ADMIN ROUTES ================== */
        Route::group(['middleware' => 'admin'], function () {
            //Update User Details
            Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
            Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

            Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
            Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

            //airlines;
            Route::resource("airlines", AirlineController::class);

            //planes
            Route::resource("planes", PlaneController::class);

            //airports
            Route::resource("airports", AirportController::class);

            //flights
            Route::resource("flights", FlightController::class);

            //Language Translation
            Route::get('index/{locale}', [HomeController::class, 'lang']);
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});

//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
