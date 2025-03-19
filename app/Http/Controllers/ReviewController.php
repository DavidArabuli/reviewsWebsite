<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Mail\ReviewPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index', [
            $reviews = Review::with('author')->latest()->paginate(5),
            'reviews' => $reviews
        ]);
    }
    public function create()
    {
        return view('reviews.create');
    }
    public function show(Review $review)
    {
        return view('reviews.show', ['review' => $review]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required'],

        ]);
        $review = Review::create([
            'title' => request('title'),
            'content' => request('content'),
            'author_id' => 1,
        ]);
        Mail::to($review->author->user)->queue(
            new ReviewPosted($review)
        );

        return redirect('/reviews');
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', ['review' => $review]);
    }
    public function update(Review $review)
    {
        // authorize...
        // validation
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required'],
        ]);
        // update and persist
        // $review = Review::findOrFail($id);

        // $review->title = request('title');
        // $review->content = request('content');
        // $review->save();

        $review->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);
        return redirect('/reviews/' . $review->id);
    }
    public function destroy(Review $review)
    {
        // authorize
        // delete
        // Review::findOrFail($id)->delete(); --same as below
        // $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/reviews');
        // redirect
    }
}
