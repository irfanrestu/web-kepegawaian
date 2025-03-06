<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $user = User::all();
        $post = Post::all();

        return view('post.index', compact('user', 'post')); 
        
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // Check if the post exists
        if (!$post) {
            abort(404); // Return a 404 error if the post is not found
        }

        // Pass the post to the view
        return view('post.singlepost', compact('post'));
        }
}
