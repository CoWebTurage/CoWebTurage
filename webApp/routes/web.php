<?php

use App\Http\Controllers\Messages\ConversationController;
use App\Http\Controllers\GenreUserController;
use App\Http\Controllers\Messages\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Review\ReviewController;
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
    });

    Route::get('/review/{user_id}/', [ReviewController::class, 'view']);
    Route::get('/review/', [ReviewController::class, 'viewNewReviewsPossible'])->name('review.new');
    Route::post('/review/', [ReviewController::class, 'createReview'])->name('review.send');
    Route::put('/review/{review_id}/', [ReviewController::class, 'edit']);

});


Route::get('/landing-page', function () {
    return redirect('landing_page/index.html');
});

Route::get("/map", function () {
    return view('map');
});
