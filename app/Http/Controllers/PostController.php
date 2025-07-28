<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $query = Post::with('user')->where('type', 'blog');



        $posts = $query->paginate(10);

        return view('posts.index', compact('posts'));
    }
    public function create(Request $request)
    {


        return view('posts.create');
    }

    public function show(Post $post)
    {

        $user = $post->user;
        return view('posts.show', ['post' => $post]);
    }

    public function store()
    {

        request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'content' => ['required', 'string', 'max:5000'],

            'screenshots' => 'array|max:5',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ]);
        $post = Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'slug' => Str::slug(request('title')),

            'user_id' => auth()->id(),
        ]);
        if (request()->hasFile('screenshots')) {
            $screenshotsPaths = [];

            foreach (request()->file('screenshots') as $screenshot) {
                $path = $screenshot->store('screenshots', 'public');
                $screenshotsPaths[] = $path;
            }


            $post->update([
                'screenshots' => $screenshotsPaths
            ]);
        }



        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'content' => ['required', 'string', 'max:5000'],
            'screenshots' => 'array|max:5',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content'),

        ]);
        if (request()->hasFile('screenshots')) {
            $screenshotsPaths = [];

            foreach (request()->file('screenshots') as $screenshot) {
                $path = $screenshot->store('screenshots', 'public');
                $screenshotsPaths[] = $path;
            }


            $post->update([
                'screenshots' => $screenshotsPaths
            ]);
        }


        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/');
    }
}
