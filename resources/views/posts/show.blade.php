<x-guest-layout>
    <h1 class="font-bold text-3xl mb-4 underline-offset-8 text-center uppercase text-zinc-700"></h1>
    <a href="{{ route('posts.index') }}">Retour aux Posts</a>
    <div class="flex justify-center items-center">
        <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'article">
    </div>
    <div class="mb-4 text-xs text-gray-500">
        {{ $post->published_at }}
    </div>

    <div>
        {!! \nl2br($post->legend) !!}
    </div>

</x-guest-layout>