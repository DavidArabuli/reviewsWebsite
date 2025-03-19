<?php

use App\Models\Review;
use App\Jobs\TranslateJob;
use App\Mail\ReviewPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('test', function () {
    $review = Review::first();
    TranslateJob::dispatch($review);
    return 'done';
});

Route::view('/', 'welcome');

Route::controller(ReviewController::class)->group(function () {


    Route::get('/reviews', 'index');

    Route::get('/reviews/create', 'create');

    Route::post('/reviews', 'store')->middleware('auth');

    Route::get('/reviews/{review}', 'show');

    Route::get('/reviews/{review}/edit', 'edit')->middleware('auth')
        ->can('edit', 'review');

    Route::patch('/reviews/{review}', 'update');

    Route::delete('/reviews/{review}', 'destroy');
});

// Route::resource('reviews', ReviewController::class);

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin', [AdminController::class, 'index'])->middleware(AdminMiddleware::class)->name('admin.dashboard');

Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
