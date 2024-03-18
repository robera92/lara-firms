<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BusinessController;

use App\Models\Business;

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
    $results = [];
    return view('welcome', compact('results'));
});

Route::get('/dashboard', function () {
    $results = [];
    return view('welcome', compact('results'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

    Route::get('/add-business', [BusinessController::class, 'create']);
    Route::post('/add-business/save', [BusinessController::class, 'store'] );
    Route::get('/business/delete/{business}', [BusinessController::class, 'destroy']);
    Route::get('/business/update/{business}', [BusinessController::class, 'edit']);
    Route::post('/business/update/{business}/save', [BusinessController::class, 'update']);


});


// new routes

Route::post('/', [BusinessController::class, 'search'] );
Route::get('/business/{business}', [BusinessController::class, 'show']);

Route::get('/all', function () {
    $companies = DB::table('businesses')->orderByDesc('id')->simplePaginate(6);
    return view('pages.all-business', compact('companies') );
});

require __DIR__.'/auth.php';
