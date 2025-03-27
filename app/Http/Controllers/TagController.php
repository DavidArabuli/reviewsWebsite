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
        $tagName = trim(strtolower(request('tag')));

        request()->merge(['tag' => $tagName]);

        request()->validate([
            'tag' => 'required|unique:tags,name'
        ]);
        // dd('hey from store tags');
        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }
}
