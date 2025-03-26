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
}
