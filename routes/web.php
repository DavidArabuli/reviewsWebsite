<?php

use App\Models\Review;
use App\Jobs\TranslateJob;
use App\Mail\ReviewPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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

Route::controller(ReviewController::class)->group(function () {


    Route::get('/reviews', 'index')->name('reviews.index');

    Route::get('/reviews/create', 'create')->middleware('auth');

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
