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
    <div class="flex mt-8">

        <a class="flex mt-8 hover:-translate-y-1 transition
    " href="{{ route('profile.show', $post->user) }}">
            <x-avatar class="h-20 w-20" :user="$post->user" />
            <div class="ml-4 flex flex-col justify-center">
                <div class="text-gray-700">{{ $post->user->name }}</div>
                <div class="text-gray-500">{{ $post->user->email }}</div>
            </div>
        </a>
    </div>
</x-guest-layout>