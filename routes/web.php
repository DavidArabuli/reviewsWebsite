<?php

use App\Models\Review;
use App\Jobs\TranslateJob;
use App\Mail\ReviewPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\GameController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserManagementController;

Route::get('test', function () {
    $review = Review::first();
    TranslateJob::dispatch($review);
    return 'done';
});

Route::view('/', 'welcome');

// *********** REVIEW ROUTES ***********

Route::controller(ReviewController::class)->group(function () {

    Route::get('/reviews', 'index')->name('reviews.index');
    Route::get('/reviews/create', 'create')->name('reviews.create')->middleware('auth');
    Route::post('/reviews', 'store')->middleware('auth');
    Route::get('/reviews/{review}', 'show')->name('reviews.show');
    Route::get('/reviews/{review}/edit', 'edit')->middleware('auth')
        ->can('edit', 'review');
    Route::patch('/reviews/{review}', 'update');
    Route::delete('/reviews/{review}', 'destroy');
});

// *********** TAG ROUTES ***********

Route::controller(TagController::class)->group(function () {

    Route::get('/tags', 'index')->name('tags.index');
    Route::get('/tags/create', 'create')->name('tags.create');
    Route::post('/tags', 'store')->name('tags.store');
    Route::get('/tags/{tag}', 'show')->name('tags.show');
    Route::get('/tags/{tag}/edit', 'edit')->name('tags.edit');
    // ->middleware('auth')
    // ->can('edit', 'tag');
    Route::patch('/tags/{tag}', 'update')->name('tags.update');
    Route::delete('/tags/{tag}', 'destroy');
});


// *********** GAME ROUTES ***********

Route::controller(GameController::class)->group(function () {

    Route::get('/games', 'index')->name('games.index');
    Route::get('/games/create', 'create')->middleware('auth');
    Route::post('/games', 'store')->middleware('auth');
    Route::get('/games/{game}', 'show')->name('games.show');

    // Route::get('/games/{game}/edit', 'edit')->middleware('auth')
    //     ->can('edit', 'game');

    // Route::patch('/games/{game}', 'update');

    // Route::delete('/games/{game}', 'destroy');
});

// Route::resource('reviews', ReviewController::class);

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin/users')->name('admin.users.')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index');
        Route::get('/{user}', [UserManagementController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserManagementController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [UserManagementController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserManagementController::class, 'destroy'])->name('destroy');
    });
});



Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
