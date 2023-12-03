<script>
    document.querySelectorAll('.like-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Ici, vous pouvez ajouter une requête AJAX pour envoyer le like
        });
    });
</script>
<x-app-layout>
    <x-slot name="header">

        <h1 class="font-bold text-3xl underline-offset-8 text-center uppercase text-zinc-700"></h1>
        <a href="{{ route('posts.index') }}">Retour aux Posts</a>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-8">
        <!-- Conteneur Flex pour l'image et les informations de l'utilisateur/la légende -->
        <div class="flex flex-wrap justify-center items-start mt-4 ">
            <!-- Conteneur pour l'image -->
            <div class="w-full md:w-1/2 px-4 space-y-3">
                <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'post" class="w-full h-auto object-cover border-[3px] border-[#395922]">
                <div class="mb-4 text-xs text-gray-500">
                    {{ $post->published_at->diffForHumans()  }}
                </div>
            </div>

            <!-- Conteneur pour les détails de l'utilisateur et la légende -->
            <div class="w-full md:w-1/2 px-4 space-y-6">
                <div class="flex mt-8">
                    <a class="flex hover:-translate-y-1 transition" href="{{ route('profile.show', $post->user) }}">
                        <x-avatar class="h-20 w-20 border-[3px] border-[#395922]" :user="$post->user" />
                        <div class="ml-4 flex flex-col justify-center">
                            <div class="text-gray-700">{{ $post->user->name }}</div>
                            <div class="text-gray-500">{{ $post->user->email }}</div>
                        </div>
                    </a>
                </div>
                <form action="{{ route('post.like', $post->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="flex space-x-2">
                        <div>
                            {{ $post->likes->count() }}
                        </div>
                        @if ($like === null)<x-majestic-heart-line class="w-6 h-6 text-[#395922]" />
                        @else
                        <x-majestic-heart-solid class="w-6 h-6 text-[#395922]" />
                        @endif
                    </button>
                </form>
                <div>
                    {!! \nl2br($post->legend) !!}
                </div>
            </div>
        </div>

        <div class=" mt-8">
            <h2 class="font-bold text-xl mb-4">Commentaires</h2>

            <div class="flex-col space-y-4">
                @forelse ($comments as $comment)
                <div class="flex bg-[#E9F2EB] shadow p-4 space-x-4">
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
                            <p class="border bg-white  p-4">
                                {{ $comment->comment }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex bg-white shadow p-4 space-x-4">
                    Aucun commentaire pour l'instant
                </div>
                @endforelse @auth
            </div>
            <form action="{{ route('posts.comments.add', $post) }}" method="POST" class="flex bg-white  shadow p-4 mt-4">
                @csrf
                <div class="flex justify-start items-start h-full mr-4">
                    <x-avatar class="h-10 w-10" :user="auth()->user()" />
                </div>
                <div class="flex flex-col justify-center w-full">
                    <div class="text-gray-700">{{ auth()->user()->name }}</div>
                    <div class="text-gray-500 text-sm">{{ auth()->user()->email }}</div>
                    <div class="text-gray-700">
                        <textarea name="body" id="body" rows="4" placeholder="Votre commentaire" class="w-full shadow-sm border-gray-300 bg-[#E9F2EB] focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-4"></textarea>
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

    </div>
</x-app-layout>