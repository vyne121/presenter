@php($user = Auth::user())
<nav x-data="{ open: false }" class="bg-[#F2E8CF] border-b border-[#BC4749]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('main') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-[#212121]" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if($user)
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('presents.my')" :active="request()->routeIs('presents.my')" class="text-[#BC4749]">
                            {{ __('Ajándékaim') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('contributions')" :active="request()->routeIs('contributions')" class="text-[#BC4749]">
                            {{ __('Hozzájárulásaim') }}
                        </x-nav-link>
                    </div>
                @endif
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('presents.index')" :active="request()->routeIs('presents.index')" class="text-[#BC4749]">
                            {{ __('Minden ajándék') }}
                        </x-nav-link>
                    </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if($user)
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 ...">
                                <div>{{ $user->name }}</div>
                                <div class="ms-1">
                                    <!-- chevron svg -->
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Kijelentkezés') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-sm text-[#212121] hover:underline">Bejelentkezés</a>
                    </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Bejelentkezés') }}
            </x-responsive-nav-link>
        </div>

        @if($user)
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 ">{{ $user->name }}</div>
                    <div class="font-medium text-sm text-gray-600">{{ $user->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-[#BC4749]">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('contributions')" class="text-[#BC4749]">
                        {{ __('Hozzájárulásaim') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('presents.my')" class="text-[#BC4749]">
                        {{ __('Ajándékaim') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('presents.index')"
                                           class="text-[#BC4749]">
                        {{ __('Minden ajándék') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();"
                                               class="text-[#BC4749]">
                            {{ __('Kijelentkezés') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
