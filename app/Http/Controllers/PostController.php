<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $user = User::all();
        $posts = Post::with(['user', 'user.role'])->get();

        return view('post.index', compact('user', 'posts')); 
        
    }
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'content' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
    ]);

    // Initialize thumbnailPath as null
    $thumbnailPath = null;

    // Handle the thumbnail upload
    if ($request->hasFile('thumbnail')) {
        // Store the uploaded file in the 'public/thumbnails' directory
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    // Create the post
    Post::create([
        'judul' => $validatedData['judul'],
        'content' => $validatedData['content'],
        'thumbnail' => $thumbnailPath, // Save the path to the database (or null if no thumbnail)
        'id_user' => auth()->user()->id
    ]);

    // Redirect to a success page or back to the form with a success message
    return redirect()->route('post.index')->with('success', 'Post created successfully!');
}

    public function edit($post_id)
{
    $user = User::all();
    $pegawai = Pegawai::all();
    $post = Post::where('post_id', $post_id)->first();

    return view('post.edit', compact('post', 'pegawai', 'user'));
}

public function update(Request $request, $post_id)
{
    // Fetch the post by post_id
    $post = Post::where('post_id', $post_id)->first();

    // Check if the post exists
    if (!$post) {
        abort(404, 'Post not found.');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'content' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle thumbnail update
    if ($request->hasFile('thumbnail')) {
        // Delete the old thumbnail if it exists
        if ($post->thumbnail && Storage::exists($post->thumbnail)) {
            Storage::delete($post->thumbnail);
        }
        // Store the new thumbnail in the 'public/thumbnails' directory
        $path = $request->file('thumbnail')->store('thumbnails', 'public');
        $post->thumbnail = $path; // Save the correct path to the database
    } elseif ($request->input('remove_photo') == '1') {
        // Remove the thumbnail if the remove_photo flag is set
        if ($post->thumbnail && Storage::exists($post->thumbnail)) {
            Storage::delete($post->thumbnail);
        }
        $post->thumbnail = null; // Set thumbnail to null in the database
    }

    // Update the post
    $post->judul = $validatedData['judul'];
    $post->content = $validatedData['content'];
    $post->id_user = auth()->user()->id;
    $post->save();

    return redirect()->route('post.index')->with('success', 'Post updated successfully.');
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

        public function destroy(Post $post_id)
        {
            $post_id->delete();
            return redirect()->route('post.index')->with('success', 'Data berhasil di hapus');
        }
}
