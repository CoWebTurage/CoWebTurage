<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\Messages\ConversationController;
use App\Http\Controllers\GenreUserController;
use App\Http\Controllers\Messages\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Livewire\EditPaymentLink;
use App\Http\Livewire\EditPlaylist;
use App\Models\User;
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
Route::get('/home', [TripController::class, 'home'])->name('home');

Route::get('/about_us', function () {
    return view('about-us');
})->name('about_us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/chat', [ConversationController::class, 'displayConversations'])->name('messages.chat');
    Route::get('/chat/{user_id}/', [ConversationController::class, 'showMessage']);

    Route::get('/messages', [MessageController::class, 'view'])->name('message.display');
    Route::post('/messages', [MessageController::class, 'send'])->name('message.send');

    Route::singleton('/profile', ProfileController::class)->destroyable();

    Route::prefix('/profile/{user}')->group(function () {
        Route::get('/music', function (User $user) {
            return view('profile.music.show', [
                'user' => $user,
            ]);
        })->name('music.show');

        Route::singleton('genre', GenreUserController::class)->except('show');
        Route::get('/playlist/edit', EditPlaylist::class)->name('playlist.edit');
        Route::get('/payment/edit', EditPaymentLink::class)->name('payment.edit');
        Route::get('/cars', [CarController::class, 'index'])->name('car.index');
    });

    Route::resource('car', CarController::class)->except(['index', 'show']);

    Route::get('/review/{user_id}/', [ReviewController::class, 'view']);
    Route::get('/review/', [ReviewController::class, 'viewNewReviewsPossible'])->name('review.new');
    Route::post('/review/', [ReviewController::class, 'createReview'])->name('review.send');
    Route::put('/review/{review_id}/', [ReviewController::class, 'edit']);

});

Route::get('/create-journey', [TripController::class, 'listVehicles'])->name('listVehicles');
Route::get("/successAddTrip", function () {
    return view('create_trip.add-success');
});

Route::post('/create-trip', [TripController::class, 'createTrip'])->name('create-trip');

Route::post('/searchTrips', [SearchController::class, 'searchTrip'])->name('searchTrips');
//Route::get('/searchDetails/{id}', [SearchController::class, 'searchDetails'])->name('searchDetails');
Route::get('/searchDetails', [SearchController::class, 'searchDetails'])->name('searchDetails');

Route::get('/test', function () {
    return view('test');
})->name('test');


Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/showMap', [SearchController::class, 'showMap'])->name('showMap');
//Route::get('/test', [SearchController::class, 'test'])->name('test');

Route::get('/landing-page', function () {
    return redirect('landing_page/index.html');
});

Route::get("/map", function () {
    return view('map');
});
