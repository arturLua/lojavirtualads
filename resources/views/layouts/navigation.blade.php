<nav x-data="{ open: false }" class="bg-slate-900 border-b border-slate-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-slate-400" />
                    </a>
                </div>

                <!-- Navigation Links — visíveis apenas para usuários autenticados -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-slate-300 hover:text-white border-transparent hover:border-amber-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link href="{{ url('products') }}" :active="request()->is('products*')"
                        class="text-slate-300 hover:text-white border-transparent hover:border-amber-500">
                        {{ __('Produtos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ url('suppliers') }}" :active="request()->is('suppliers*')"
                        class="text-slate-300 hover:text-white border-transparent hover:border-amber-500">
                        {{ __('Fornecedores') }}
                    </x-nav-link>

                    <x-nav-link href="{{ url('/') }}" :active="request()->is('/')"
                        class="text-amber-400 hover:text-amber-300 border-transparent hover:border-amber-500">
                        {{ __('Ver Loja') }}
                    </x-nav-link>
                </div>
                @endauth
            </div>

            <!-- Settings Dropdown / botões públicos -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-300 bg-slate-900 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-slate-300 text-sm hover:text-white transition-colors">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="text-sm border border-amber-500 text-amber-400 px-4 py-1.5 rounded-full hover:bg-amber-500 hover:text-slate-900 transition-all font-medium">
                        Criar conta
                    </a>
                </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none focus:bg-slate-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ url('products') }}" :active="request()->is('products*')">
                {{ __('Produtos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ url('suppliers') }}" :active="request()->is('suppliers*')">
                {{ __('Fornecedores') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                {{ __('Ver Loja') }}
            </x-responsive-nav-link>
        </div>
        @endauth

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-800">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-slate-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Entrar') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Criar conta') }}
                </x-responsive-nav-link>
            </div>
            @endauth
        </div>
    </div>
</nav>
