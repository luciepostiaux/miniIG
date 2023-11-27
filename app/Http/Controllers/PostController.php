<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Comment;
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
        $post = Post::findOrFail($id);

        $comments = $post
            ->comments()
            ->orderByDesc('created_at')
            ->get();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
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

    public function addComment(Request $request, Post $post)
    {
        // On vérifie que l'utilisateur est authentifié
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        // On crée le commentaire
        $comment = $post->comments()->make();
        // On remplit les données
        $comment->comment = $request->input('body');
        $comment->user_id = auth()->user()->id;
        // On sauvegarde le commentaire
        $comment->save();

        // On redirige vers la page de l'article
        return redirect()->back();
    }
}
