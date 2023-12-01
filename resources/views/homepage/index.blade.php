<x-guest-layout>
    <div class="flex flex-col justify-center items-center min-h-screen  ">
        <div class="mb-14 text-center px-4 space-y-3 ">
            <h2 class="font-semibold text-xl">Bienvenue sur InstaInspire, votre nouvelle plateforme pour capturer et partager des moments inoubliables !</h2>
            <p>InstaInspire n'est pas seulement un réseau social, c'est un espace vibrant où les amoureux de la photographie, les passionnés d'art et les raconteurs d'histoires du quotidien se réunissent pour partager leurs expériences.

                Immortalisez Chaque Instant : Sur InstaInspire, chaque cliché raconte une histoire unique. Capturez vos moments, des plus spectaculaires aux plus simples, et partagez-les avec une communauté qui valorise la diversité et la beauté.


                Nous sommes heureux de vous accueillir dans notre communauté. Créez, partagez, connectez-vous et inspirez-vous - tout cela sur InstaInspire.

                Rejoignez InstaInspire dès aujourd'hui et plongez dans un univers de créativité et de connexions !</p>
        </div>

        <div class="flex flex-wrap justify-center items-center w-full px-4">
            <!-- Image -->
            <div class="w-full md:w-1/2 px-4 flex justify-center border-[3px] border-[#395922]">
                <img src="{{ asset('images/screenshot.png') }}" alt="démo du site" class="w-full h-auto object-cover max-w-screen-lg max-h-screen">
            </div>

            <!-- Formulaire de connexion -->
            @guest
            <div class="hidden md:flex md:w-1/2 px-4 flex-col justify-center">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="w-full max-w-xs">
                    @csrf

                    <!-- Champs du formulaire -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-primary-button class="ms-3 bg-[#6C8C6E]">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
            @endguest
        </div>

    </div>
    </div>
</x-guest-layout>