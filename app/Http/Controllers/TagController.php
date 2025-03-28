<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        // dd('hey from all tags');
        return view('tags.index', ['tags' => Tag::all()]);
    }
    public function show($id)
    {
        // dd('hey from all tags');
        return view('tags.show', ['tag' => Tag::findOrFail($id)]);
    }
    public function create()
    {
        // dd('hey from create tags');
        return view('tags.create');
    }
    public function store()
    {
        // $tagName = trim(strtolower(request('tag')));

        // request()->merge(['tag' => $tagName]);

        request()->validate([
            'tag' => 'required|unique:tags,name'
        ]);
        Tag::create([
            'name' => request('tag'),

        ]);
        // dd('hey from store tags');
        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }
    public function edit(Tag $tag)
    {
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Tag $tag)
    {

        request()->validate([
            'tag' => 'required|unique:tags,name',
        ]);

        $tag->update([
            'name' => request('tag'),

        ]);
        return redirect('/tags/' . $tag->id);
    }
    public function destroy(tag $tag)
    {
        // authorize
        // delete
        // tag::findOrFail($id)->delete(); --same as below
        // $tag = tag::findOrFail($id);
        $tag->delete();

        return redirect('/tags');
        // redirect
    }
}
