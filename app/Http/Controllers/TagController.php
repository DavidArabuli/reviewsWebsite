<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = new Tag();

        return view('tags.index', ['tags' => Tag::all(), 'tag' => $tag]);
    }
    public function show($id)
    {

        return view('tags.show', ['tag' => Tag::findOrFail($id)]);
    }
    public function create()
    {

        return view('tags.create');
    }
    public function store()
    {


        request()->validate([
            'tag' => ['required', 'unique:tags,name', 'max:50']
        ]);
        Tag::create([
            'name' => request('tag'),

        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }
    public function edit(Tag $tag)
    {
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Tag $tag)
    {

        request()->validate([
            'tag' => ['required', 'unique:tags,name', 'max:50'],
        ]);

        $tag->update([
            'name' => request('tag'),

        ]);
        return redirect('/tags/' . $tag->id);
    }
    public function destroy(tag $tag)
    {

        $tag->delete();

        return redirect('/tags');
    }
}
