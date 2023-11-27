<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(PostStoreRequest $request)
    {
        $post = Post::make();
        $post->legend = $request->validated()['legend'];
        $post->published_at = now();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->img_path = $imagePath; // Stocker le chemin de l'image dans une colonne 'image' de votre table 'posts'
        }

        $post->user_id = Auth::id();
        $post->save();


        return redirect()->route('posts.index');
    }
}
