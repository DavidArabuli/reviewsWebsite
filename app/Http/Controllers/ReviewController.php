<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Review;
use App\Mail\ReviewPosted;
use Illuminate\Http\Request;
use App\Services\SteamService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{

    public function index()
    {
        $sort = request('sort', 'desc');
        $query = Review::with(['user', 'game', 'tags']);


        if (request()->has('tag')) {
            $tag = request('tag');
            $query->whereHas('tags', function ($tagQuery) use ($tag) {
                $tagQuery->where('name', $tag);
            });
        }


        $reviews = $query->orderBy('score', $sort)->paginate(10);

        return view('reviews.index', compact('reviews'));
    }
    public function create(Request $request)
    {
        $game_id = $request->query('game_id');
        $steam_id = $request->query('steam_id');
        // dd($request);
        return view('reviews.create', ['game_id' => $game_id, 'steam_id' => $steam_id, 'tags' => Tag::all()]);
    }

    public function show(Review $review)
    {
        $review->load('game');
        // dd($review->game);
        if (isset($review->steam_id)) {
            // $steamService = new SteamService($review->steam_id);
            $image_path = $review->game->image_path;
            // dd($image_path);
        };
        $user = $review->user;
        return view('reviews.show', ['review' => $review, 'image_path' => $image_path, 'user' => $user]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'content' => ['required', 'string', 'max:5000'],
            'score' => ['required'],
            'tag' => 'exists:tags,id',
            'screenshots' => 'array|max:5',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ]);
        $review = Review::create([
            'title' => request('title'),
            'content' => request('content'),
            'score' => request('score'),
            'steam_id' => request('steam_id'),
            'game_id' => request('game_id'),
            'user_id' => auth()->id(),
        ]);
        if (request()->hasFile('screenshots')) {
            $screenshotsPaths = [];

            foreach (request()->file('screenshots') as $screenshot) {
                $path = $screenshot->store('screenshots', 'public');
                $screenshotsPaths[] = $path;  // Collect all the paths
            }

            // Save the collected file paths to the review
            $review->update([
                'screenshots' => $screenshotsPaths
            ]);
        }

        if (request()->has('tag')) {
            $review->tags()->attach(request()->tag);
        }
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
            'title' => ['required', 'min:3', 'max:200'],
            'content' => ['required', 'string', 'max:5000'],
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
