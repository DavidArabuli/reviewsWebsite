<?php

use App\Models\Tag;
use App\Models\Review;
use App\Jobs\TranslateJob;
use App\Mail\ReviewPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserManagementController;

Route::get('test', function () {
    $review = Review::first();
    TranslateJob::dispatch($review);
    return 'done';
});

// Route::view('/', '/home/welcome');

// *********** POST ROUTES ***********
// Route::view('/', '/home/welcome');


Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create')->middleware('auth')->can('create', App\Models\Post::class);
    Route::post('/posts', 'store')->middleware('auth');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('')->middleware('auth')->can('update', 'post');
    Route::patch('/posts/{post}', 'update')->middleware('auth');
    Route::delete('/posts/{post}', 'destroy')->middleware('auth')->can('delete', 'post');
});

// *********** REVIEW ROUTES ***********

Route::controller(ReviewController::class)->group(function () {

    Route::get('/reviews', 'index')->name('reviews.index');
    Route::get('/reviews/create', 'create')
        ->name('reviews.create')
        ->middleware('auth');
    Route::post('/reviews', 'store')
        ->middleware('auth');
    Route::get('/reviews/{review}', 'show')->name('reviews.show');
    Route::get('/reviews/{review}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'review');
    Route::patch('/reviews/{review}', 'update')
        ->middleware('auth')
        ->can('edit', 'review');
    Route::delete('/reviews/{review}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'review');
});

// *********** TAG ROUTES ***********

Route::controller(TagController::class)->group(function () {

    Route::get('/tags', 'index')->name('tags.index');
    Route::get('/tags/create', 'create')->name('tags.create')
        ->middleware('auth')
        ->can('create', Tag::class);
    Route::post('/tags', 'store')->name('tags.store')
        ->middleware('auth')
        ->can('create', Tag::class);
    Route::get('/tags/{tag}', 'show')->name('tags.show');
    Route::get('/tags/{tag}/edit', 'edit')->name('tags.edit')
        ->middleware('auth')
        ->can('edit', 'tag');
    Route::patch('/tags/{tag}', 'update')->name('tags.update')
        ->middleware('auth')
        ->can('edit', 'tag');
    Route::delete('/tags/{tag}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'tag');
});


// *********** GAME ROUTES ***********

Route::controller(GameController::class)->group(function () {

    Route::get('/games', 'index')->name('games.index');
    Route::get('/games/create', 'create')->middleware('auth');
    Route::post('/games', 'store')->middleware('auth');
    Route::get('/games/{game}', 'show')->name('games.show');

    Route::get('/games/{game}/edit', 'edit')
        ->middleware('auth');
    // ->can('edit', 'game');

    Route::patch('/games/{game}', 'update')->middleware('auth')->can('edit', 'game');

    Route::delete('/games/{game}', 'destroy')->name('games.destroy')->can('edit', 'game');
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
Route::prefix('users')->group(function () {

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});
// Route::middleware('auth')->group(function () {

//     Route::prefix('users')->group(function () {

//         Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
//     });
// });




Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
