<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full sm:space-x-10 flex-col sm:flex-row space-y-4 sm:space-y-0">
            <div class="flex space-x-10">

                <div>

                    <x-avatar class="w-32 h-32 border-[6px] border-[#395922] " :user="$user" />
                </div>
                <div class=" flex flex-col">
                    <div class="text-gray-800 font-bold text-2xl">{{ $user->name }}
                    </div>
                    <div class="text-gray-700 text-sm">{{ $user->email }}
                    </div>
                    <div class="text-gray-500 text-xs">
                        Membre depuis {{ $user->created_at->diffForHumans() }}
                    </div>
                    <div class="text-gray-500 text-xs">
                        {{ $user->followers->count() }} followers
                    </div>
                    <div class="text-gray-500 text-xs">
                        {{ $user->following->count() }} following
                    </div>
                    @if (auth()->user()->isNot($user))
                    @if (auth()->user()->following->contains($user))
                    <form action="{{ route('users.unfollow', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-semibold text-red-800">Unfollow</button>
                    </form>
                    @else
                    <form action="{{ route('users.follow', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="font-semibold text-[#395922]">Follow</button>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
            <div class="text-gray-500">
                <div>
                    {{ $user->bio }}
                </div>
            </div>



        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ul class="grid grid-cols-1 sm:grid-cols-3  lg:grid-cols-4 2xl:grid-cols-4 gap-6">
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