<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>
    <div class="flex w-full">
        <x-avatar class="h-20 w-20" :user="$user" />
        <div class="ml-4 flex flex-col">
            <div class="text-gray-800 font-bold">{{ $user->name }}</div>
            <div class="text-gray-700 text-sm">{{ $user->email }}</div>
            <div class="text-gray-500 text-xs">
                Membre depuis {{ $user->created_at->diffForHumans() }}
            </div>
        </div>
        <div class="text-gray-500 text-xs">
            {{ $user->bio }}

            <p>{{ $user->followers->count() }} followers</p>


            <p>{{ $user->following->count() }} following</p>

        </div>


        @if (auth()->user()->isNot($user))
        @if (auth()->user()->following->contains($user))
        <form action="{{ route('users.unfollow', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Unfollow</button>
        </form>
        @else
        <form action="{{ route('users.follow', $user) }}" method="POST">
            @csrf
            <button type="submit">Follow</button>
        </form>
        @endif
        @endif

    </div>
    <div class="mt-8">
        <h2 class="font-bold text-xl mb-4">Posts</h2>
        <ul class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse ($posts as $post)
            <li>
                <x-post-card :post="$post" />
            </li>
            @empty
            <div class="text-gray-700">Aucun post</div>
            @endforelse
        </ul>
    </div>
</x-app-layout>