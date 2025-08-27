<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'reactie' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create($request->only('naam', 'email', 'reactie', 'post_id'));

        return back()->with('success', 'Reactie geplaatst!');
    }
}