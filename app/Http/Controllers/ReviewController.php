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
        $sort = request('sort', 'desc');
        $query = Review::with(['user', 'tags']);


        if (request()->has('tag')) {
            $tag = request('tag');
            $query->whereHas('tags', function ($tagQuery) use ($tag) {
                $tagQuery->where('name', $tag);
            });
        }


        $reviews = $query->orderBy('score', $sort)->paginate(10);

        return view('reviews.index', compact('reviews'));
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
            'score' => ['required'],

        ]);
        $review = Review::create([
            'title' => request('title'),
            'content' => request('content'),
            'score' => request('score'),
            'user_id' => auth()->id(),
        ]);
        Mail::to($review->user)->queue(
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
            'score' => ['required'],
        ]);
        // update and persist
        // $review = Review::findOrFail($id);

        // $review->title = request('title');
        // $review->content = request('content');
        // $review->save();

        $review->update([
            'title' => request('title'),
            'content' => request('content'),
            'score' => request('score'),
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
