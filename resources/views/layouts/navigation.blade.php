<nav class="bg-white border-b border-gray-100">

    <div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <x-responsive-nav-link :href="route('register')">
                    {{ __('Regist Admin') }}
                </x-responsive-nav-link>

            </div>
        </div>
    </div>
</nav>
