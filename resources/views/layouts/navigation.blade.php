<div class="hidden sm:flex sm:items-center">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <div class="relative">
                
                <div class="inline-flex rounded-md">
                    
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black bg-white hover:text-black focus:outline-none transition ease-in-out duration-150">
                        <div>
                            @auth
                                Hi, {{ Auth::user()->name }}
                            @else
                                Hi, Guest
                            @endauth
                        </div>                        
                    
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            @auth
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
        
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @else
                <x-dropdown-link :href="route('login')">
                    {{ __('Login') }}
                </x-dropdown-link>
            @endauth
        </x-slot>
    </x-dropdown>
</div>
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>
    <!-- <i class="fa fa-shopping-cart" aria-hidden=""></i> -->

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                {{-- {{ Auth::user()->name }} --}}
            </div>
            <div class="font-medium text-sm text-gray-500">
                {{-- {{ Auth::user()->email }} --}}
            </div>
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
        </div>
    </div>
</div>