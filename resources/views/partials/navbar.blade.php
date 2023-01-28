<nav x-data="{ open: false }" class="w-full relative z-10 bg-yellow-300 shadow border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex justify-between w-full px-6 lg:w-max md:px-0">
                    <a  class="flex items-center space-x-2" href="{{ route('welcome') }}" aria-label="logo">
                        <x-logo class="block w-auto h-16 mx-auto text-gray-800 fill-current dark:text-gray-200" />
                    </a>
                </div>
            </div>
            <div
            class="flex-wrap items-center justify-evenly hidden w-full p-6 space-y-6 bg-white lg:flex rounded-xl md:space-y-0 md:p-0 md:flex-nowrap md:bg-transparent lg:w-7/12">
                <ul class="space-y-6 text-sm gap-8 font-medium tracking-wide md:flex md:space-y-0">
                    <li>
                        <a href="{{ route('posts.list') }}" class="block transition md:px-4 hover:text-yellow-700">
                            <span>Village's recipes</span>
                        </a>
                    </li>
                    <li>
                    </li>
                    <li>
                        <a href="{{ route('products.list') }}" class="block transition md:px-4 hover:text-yellow-700">
                            <span>Village's Menus</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center gap-5 sm:ml-6">
                @auth
                    @if(Route::is('posts.list') )
                        <div class="flex items-center h-16">
                            <a href="{{ route('posts.create') }}" class="flex items-center mx-2 justify-center  text-gray-100 transition duration-150 rounded">
                                <svg class="w-6 h-6 hover:fill-orange-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    @endif
                @endauth
                <div class="">
                    <svg class="w-6 h-6 hover:fill-orange-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                </div>
                <div class="mx-2 mr-3">
                    <svg class="w-6 h-6 hover:fill-orange-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                </div>
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <div class="flex">
                                <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                            </div>

                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link> --}}
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @else
                        <div class="w-full space-y-2 border-yellow-200 lg:space-y-0 md:w-max lg:border-l">
                            @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-nav-link>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button type="submit"
                                                class="w-full px-6 py-3 text-center transition duration-150 ease-in-out rounded-full active:bg-yellow-200 focus:bg-yellow-100 sm:w-max">Logout</button>
                                        </a>
                                    </form>
                                @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <button type="button" title="Start buying"
                                            class="w-full px-6 py-3 text-center transition duration-150 ease-in-out rounded-full active:bg-yellow-200 focus:bg-yellow-100 sm:w-max">
                                            <span class="block text-sm font-semibold text-yellow-800">
                                                Sign up
                                            </span>
                                        </button>
                                    </a>
                                @endif
                                    <a href="{{ route('login') }}">
                                        <button type="button" title="Start buying"
                                            class="w-full px-6 py-3 text-center transition bg-yellow-300 rounded-full hover:bg-yellow-100 active:bg-yellow-400 focus:bg-yellow-300 sm:w-max">
                                            <span class="block text-sm font-semibold text-yellow-900">
                                                Login
                                            </span>
                                        </button>
                                    </a>
                                @endauth
                            </div>
                            @endif
                        </div>
                @endauth
            </div>
            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
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
            @endauth
        </div>
    </div>
</nav>
