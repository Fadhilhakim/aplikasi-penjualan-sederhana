<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 mx-12" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- STATUS -->
        <div>
            <x-text-input id="status" class="block mt-1 w-full" type="hidden" name="status" value="ADMIN" />
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
        
            <x-primary-button class="mt-6 py-4 w-full text-center block">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
