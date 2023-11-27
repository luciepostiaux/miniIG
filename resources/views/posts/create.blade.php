<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Créer un post
                </div>
            </div>

            <form method="POST" action="{{ route('posts.store') }}" class="flex flex-col space-y-4 text-gray-500" enctype="multipart/form-data">


                @csrf

                <div>
                    <x-input-label for="image" :value="__('Image du post')" />
                    <input id="image" type="file" class="block mt-1 w-full" name="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="legend" :value="__('Texte du post')" />
                    <textarea id="body" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="legend" rows="10">{{ old('legend') }}</textarea>
                    <x-input-error :messages="$errors->get('legend')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        {{ __('Créer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>