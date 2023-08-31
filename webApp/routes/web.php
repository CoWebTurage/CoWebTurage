<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about_us', function () {
    return view('about-us');
})->name('about_us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/searchTrips', [SearchController::class, 'searchTrip'])->name('searchTrips');
//Route::get('/searchDetails/{id}', [SearchController::class, 'searchDetails'])->name('searchDetails');

Route::get('/searchDetails', [SearchController::class, 'searchDetails']);




Route::get('/search', function () {
    return view('search');
})->name('search');



//Route::get('/test', [SearchController::class, 'test'])->name('test');

Route::get('/landing-page', function () {
    return redirect('landing_page/index.html');
});

require __DIR__.'/auth.php';

Route::get("/map", function(){
    return view('map');
});
