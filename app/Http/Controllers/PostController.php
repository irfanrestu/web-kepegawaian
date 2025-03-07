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
        $posts = Post::with(['user', 'user.role'])->get();

        return view('post.index', compact('user', 'posts')); 
        
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
        ]);

        // Handle the thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Store the uploaded file in the 'public/thumbnails' directory
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath; // Save the path to the database
        }

        // Create the post
        Post::create([
            'judul' => $request->judul,
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'id_user' => auth()->user()->id

        ]);

        // Redirect to a success page or back to the form with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
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
