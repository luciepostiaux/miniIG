<script>
    document.querySelectorAll('.like-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Ici, vous pouvez ajouter une requête AJAX pour envoyer le like
        });
    });
</script>
<x-app-layout>

    <h1 class="font-bold text-3xl mb-4 underline-offset-8 text-center uppercase text-zinc-700"></h1>
    <a href="{{ route('posts.index') }}">Retour aux Posts</a>
    <div class="flex justify-center items-center">
        <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'post">
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
    <form action="{{ route('post.like', $post->id) }}" method="POST">
        @csrf
        <button type="submit">{{ $post->likes->count() }} Like</button>
    </form>

    <div class="mt-8">
        <h2 class="font-bold text-xl mb-4">Commentaires</h2>

        <div class="flex-col space-y-4">
            @forelse ($comments as $comment)
            <div class="flex bg-white rounded-md shadow p-4 space-x-4">
                <div class="flex justify-start items-start h-full">
                    <x-avatar class="h-10 w-10" :user="$comment->user" />
                </div>
                <div class="flex flex-col justify-center w-full space-y-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-4 items-center justify-center">
                            <div class="flex flex-col justify-center">
                                <div class="text-gray-700">{{ $comment->user->name }}</div>
                                <div class="text-gray-500 text-sm">
                                    {{ $comment->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col justify-center w-full text-gray-700">
                        <p class="border bg-gray-100 rounded-md p-4">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex bg-whi te rounded-md shadow p-4 space-x-4">
                Aucun commentaire pour l'instant
            </div>
            @endforelse @auth
        </div>
        <form action="{{ route('posts.comments.add', $post) }}" method="POST" class="flex bg-white rounded-md shadow p-4">
            @csrf
            <div class="flex justify-start items-start h-full mr-4">
                <x-avatar class="h-10 w-10" :user="auth()->user()" />
            </div>
            <div class="flex flex-col justify-center w-full">
                <div class="text-gray-700">{{ auth()->user()->name }}</div>
                <div class="text-gray-500 text-sm">{{ auth()->user()->email }}</div>
                <div class="text-gray-700">
                    <textarea name="body" id="body" rows="4" placeholder="Votre commentaire" class="w-full rounded-md shadow-sm border-gray-300 bg-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-4"></textarea>
                </div>
                <div class="text-gray-700 mt-2 flex justify-end">
                    <button type="submit" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
                        Ajouter un commentaire
                    </button>
                </div>
            </div>
        </form>
        @else
        <div class="flex bg-white rounded-md shadow p-4 text-gray-700 justify-between items-center">
            <span> Vous devez être connecté pour ajouter un commentaire </span>
            <a href="{{ route('login') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow-md">Se connecter</a>
        </div>
        @endauth
    </div>

    </div>
</x-app-layout>