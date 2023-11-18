<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Liste des posts</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($posts as $post)
        <li>
            <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'article">
            <a class="flex bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition" href="{{ route('posts.show', $post) }}">
                {{Str::limit( $post->legend ,250) }}
            </a>
        </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</x-guest-layout>