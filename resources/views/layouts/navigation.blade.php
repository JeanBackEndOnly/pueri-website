<nav x-data="{ open: false }" class="bg-black/50 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex justify-start items-center gap-2 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-50 animate-pulse"></div>
                            <img src="{{ asset('system_image/pueri-logo.png') }}" class="relative h-10 w-10 object-contain" alt="Puericulture">
                        </div>
                        <strong class="text-white font-bold text-lg group-hover:text-red-400 transition">ZPuericultureC Org. no.144, Inc.</strong> 
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (auth()->user()->isAdmin())
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.about')" :active="request()->routeIs('admin.about')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('About') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.offer')" :active="request()->routeIs('admin.offer')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Offer') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.position')" :active="request()->routeIs('admin.position')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Position') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.contact')" :active="request()->routeIs('admin.contact')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Contact') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.unit')" :active="request()->routeIs('admin.unit')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Unit') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.application')" :active="request()->routeIs('admin.application')" class="text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition">
                            {{ __('Application') }}
                        </x-nav-link>
                    </div>
                @endif  
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-white/20 rounded-lg text-sm font-medium text-white bg-white/10 hover:bg-white/20 hover:border-white/30 focus:outline-none transition ease-in-out duration-150 backdrop-blur-sm">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="absolute right-0 mt-2 w-48 bg-black/80 backdrop-blur-md rounded-lg shadow-lg py-1 border border-white/10">
                            <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-white/80 hover:text-white hover:bg-white/10 transition">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-white/80 hover:text-white hover:bg-white/10 transition">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black/95 backdrop-blur-md border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if (auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.about')" :active="request()->routeIs('admin.about')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Team') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.offer')" :active="request()->routeIs('admin.offer')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Offer') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.position')" :active="request()->routeIs('admin.position')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Position') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.contact')" :active="request()->routeIs('admin.contact')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.unit')" :active="request()->routeIs('admin.unit')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Unit') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.application')" :active="request()->routeIs('admin.application')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Application') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/10">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white/60">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>