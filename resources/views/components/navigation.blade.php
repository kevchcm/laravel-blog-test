<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>
    
    <div class="mt-8 md:mt-0 flex items-center">
{{--        @if(auth()->check())--}}
{{--        @endif--}}
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                </x-slot>
                
                <x-dropdown-item href="{{ route('post-create') }}">
                    Dashboard
                </x-dropdown-item>
                
                <x-dropdown-item
                    href="{{ route('post-create') }}"
                    :active="request()->routeIs('post-create')"
                >
                    New Post
                </x-dropdown-item>
                
                <x-dropdown-item
                    href="{{ route('post-create') }}
                    x-data={}"
                    @click.prevent="document.querySelector('#logout-form').submit()"
                >
                    Logout
                </x-dropdown-item>
                
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf<button>Logout</button>
                </form>
            </x-dropdown>
        @else
            <a href="{{ route('register-create') }}" class="text-xs font-bold uppercase">
                Register
            </a>
        
            <a href="{{ route('login-create') }}" class="text-xs font-bold uppercase ml-6">
                Login
            </a>
        @endauth
        
        <a href="#footer" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>