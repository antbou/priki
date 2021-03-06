<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('homepage') }}">
                        <x-breeze.application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                    <h2>Anthony Bouillant</h2>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-breeze.nav-link :href="route('reference.index')" :active="request()->routeIs('reference.index')">
                        {{ __('Références') }}
                    </x-breeze.nav-link>

                    @can('isModo')
                        <x-breeze.nav-link :href="route('practice.index')" :active="request()->routeIs('practice.index')">
                            {{ __('Liste de toutes les pratiques') }}
                        </x-breeze.nav-link>
                    @endcan
                    <x-breeze.nav-link-parent :href="'#'" :active="request()->routeIs('domain')">
                        <x-slot name="name"><a href="{{ route('domains') }}">Tous
                                ({{ count(App\Models\Practice::publishedPractices()) }})</a> </x-slot>
                        <x-slot name="children">
                            @foreach (App\Models\Domain::all() as $domain)
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent  dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('domain', ['slug' => $domain->slug]) }}">{{ $domain->name }}
                                    ({{ count($domain->getPublishedPractices()->get()) }})</a>
                            @endforeach
                        </x-slot>
                    </x-breeze.nav-link-parent>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Auth::check())
                    <x-breeze.dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }} ({{ Auth::user()->role()->name }})</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-breeze.dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-breeze.dropdown-link>
                            </form>
                        </x-slot>
                    </x-breeze.dropdown>
                @else
                    <x-breeze.nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-breeze.nav-link>
                @endif

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-breeze.responsive-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')">
                {{ __('Dashboard') }}
            </x-breeze.responsive-nav-link>
            <x-breeze.responsive-nav-link-parent :href="'#'" :active="request()->routeIs('domain')">
                <x-slot name="name"><a href="{{ route('domains') }}">Tous
                        ({{ count(App\Models\Domain::all()) }})</a></x-slot>
                <x-slot name="children">
                    @foreach (App\Models\Domain::all() as $domain)
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent  dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('domain', ['slug' => $domain->slug]) }}">{{ $domain->name }}
                            ({{ count($domain->practices()->get()) }})</a>
                    @endforeach
                </x-slot>
            </x-breeze.responsive-nav-link-parent>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Auth::check())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}
                        ({{ Auth::user()->role()->name }})</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-breeze.responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-breeze.responsive-nav-link>
                    </form>
                </div>
            @else
                <x-breeze.responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-breeze.responsive-nav-link>
            @endif

        </div>
    </div>
</nav>
