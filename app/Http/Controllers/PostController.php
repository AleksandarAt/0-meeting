<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'titel' => 'required',
            'inhoud' => 'required',
        ]);

        Post::create([
        'titel' => $request->titel,
        'inhoud' => $request->inhoud,
    ]);

        return redirect('/posts')->with('success', 'Post aangemaakt!');
    }
}