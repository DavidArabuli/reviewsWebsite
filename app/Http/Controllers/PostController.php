<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $query = Post::with(['user']);


        $posts = $query->paginate(10);

        return view('posts.index', compact('posts'));
    }
    public function create(Request $request)
    {

        // dd($request);
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

            // 'screenshots' => 'array|max:5',
            // 'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ]);
        Post::create([
            'title' => request('title'),
            'content' => request('content'),

            'user_id' => auth()->id(),
        ]);
        // if (request()->hasFile('screenshots')) {
        //     $screenshotsPaths = [];

        //     foreach (request()->file('screenshots') as $screenshot) {
        //         $path = $screenshot->store('screenshots', 'public');
        //         $screenshotsPaths[] = $path;  // Collect all the paths
        //     }

        //     // Save the collected file paths to the post
        //     $post->update([
        //         'screenshots' => $screenshotsPaths
        //     ]);
        // }



        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        // authorize...
        // validation
        request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'content' => ['required', 'string', 'max:5000'],

        ]);
        // update and persist
        // $post = post::findOrFail($id);

        // $post->title = request('title');
        // $post->content = request('content');
        // $post->save();

        $post->update([
            'title' => request('title'),
            'content' => request('content'),

        ]);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        // authorize
        // delete
        // post::findOrFail($id)->delete(); --same as below
        // $post = post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
        // redirect
    }
}
