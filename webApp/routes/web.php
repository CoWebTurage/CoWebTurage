<?php

use App\Http\Controllers\Messages\ConversationController;
use App\Http\Controllers\Messages\MessageController;
use App\Http\Controllers\ProfileController;
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
    Route::singleton('/profile', ProfileController::class)->destroyable();
});


Route::get('/landing-page', function () {
    return redirect('landing_page/index.html');
});

Route::get('/chat', [ConversationController::class, 'displayConversations'])->middleware('auth')->name('messages.chat');

Route::get('/messages', [MessageController::class, 'view'])->name('message.display');
Route::post('/messages', [MessageController::class, 'send'])->name('message.send');
Route::get('/messages/{user_id}/{user2_id}', [ConversationController::class, 'showMessage']);

require __DIR__ . '/auth.php';
Route::get("/map", function(){
    return view('map');
});
