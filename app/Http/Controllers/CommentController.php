<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CommentController extends Controller
{
    function store(Post $post) {
        request()->validate([
           'body' => ['required']
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
