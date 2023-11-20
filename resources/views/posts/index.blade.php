<x-guest-layout>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($posts as $post)
        <li>
            <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'article">
            <x-post-card :post="$post" />
        </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</x-guest-layout>