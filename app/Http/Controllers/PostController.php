<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_editor) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Only editors can create posts.'], 403);
            }
            return redirect()->route('posts.index');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Auth::user()->posts()->create($request->only(['title', 'content']));

        return redirect()->route('posts.index');
    }
}