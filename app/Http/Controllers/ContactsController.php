<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {

        // $query = Post::with(['user']);


        // $contacts = $query->paginate(10);
        // $post = Post::with('user')->where('type', 'contacts')->firstOrFail();
        $post = Post::with('user')->where('type', 'contacts')->first();


        // return view('contacts.index');
        return view('contacts.index', ['post' => $post]);
    }
    public function create(Request $request)
    {

        // dd($request);
        return view('contacts.create');
    }

    // public function show(Post $post)
    // {

    //     $user = $post->user;
    //     return view('contacts.show', ['post' => $post]);
    // }

    public function store()
    {
        // dd(request()->all());
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
            'type' => 'contacts',

            'user_id' => auth()->id(),
        ]);
        if (request()->hasFile('screenshots')) {
            $screenshotsPaths = [];

            foreach (request()->file('screenshots') as $screenshot) {
                $path = $screenshot->store('screenshots', 'public');
                $screenshotsPaths[] = $path;  // Collect all the paths
            }

            // Save the collected file paths to the post
            $post->update([
                'screenshots' => $screenshotsPaths
            ]);
        }



        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('contacts.edit', ['post' => $post]);
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

        return redirect('/contacts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        // authorize
        // delete
        // post::findOrFail($id)->delete(); --same as below
        // $post = post::findOrFail($id);
        $post->delete();

        return redirect('/');
        // redirect
    }
}
