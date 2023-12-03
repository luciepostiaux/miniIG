<div {{ $attributes->merge(['class' => 'rounded-full overflow-hidden']) }}>
    @if($user->avatar_path)
    <img class=" rounded-full object-cover object-center" src="{{ asset('storage/' . $user->avatar_path) }}" alt="{{ $user->name }}" />
    @else
    <div class="flex items-center justify-center bg-[#E9F2EB] h-full">
        <span class="text-2xl font-medium text-[#395922]">
            {{ $user->name[0] }}
        </span>
    </div>
    @endif
</div>