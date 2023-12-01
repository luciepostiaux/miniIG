<div class="mt-4 bg-[#AABFAF] hover:scale-95 transition h-full">
    <a class="flex flex-col h-full space-y-2   p-3 w-full  " href="{{ route('posts.show', $post) }}">
        <img src="{{ Storage::url($post->img_path) }}" alt="illustration de l'article">
        <div class="text-s text-gray-500 flex items-center space-x-2 ">
            <div>

                <x-avatar class="w-12 h-12 border-[2px] border-[#395922] " :user="$post->user" />
            </div>
            <div class="text-lg font-semibold">

                {{ $post->user->name }}
            </div>
        </div>
        <div class="font-bold text-gray-800 flex-grow">
            {{ Str::limit( $post->legend ,150)  }}
        </div>
        <div class="text-xs text-gray-500">
            {{ $post->published_at->diffForHumans() }}
        </div>
    </a>
</div>