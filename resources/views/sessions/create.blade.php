<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-black border-opacity-5 rounded-xl py-16 px-10 mt-16">
            <h1 class="text-center font-bold text-xl">
                Login
            </h1>
            
            <form method="POST" action="{{ route('login-store') }}" class="mt-16">
                @csrf
                <div class="mb-6">
                    {{--<label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">--}}
                    {{--    Username--}}
                    
                    {{--    <input--}}
                    {{--        name="username"--}}
                    {{--        type="text"--}}
                    {{--        value="{{ old('username') }}"--}}
                    {{--        class="border border-gray-400 p-2 w-full"--}}
                    {{--        required--}}
                    {{--    >--}}
                    {{--    --}}
                    {{--    @error('username')--}}
                    {{--        <p class="text-red-500 text-xs mt-1">--}}
                    {{--            {{ $message }}--}}
                    {{--        </p>--}}
                    {{--    @enderror--}}
                    {{--</label>--}}
    
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Email
        
                        <input
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="border border-gray-400 p-2 w-full"
                            required
                        >
                        
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>
                    
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Password
    
                        <input
                            name="password"
                            type="password"
                            class="border border-gray-400 p-2 w-full"
                            required
                        >
                        
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>
                    
                    <div class="mt-10">
                        <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            Login
                        </button>
                    </div>
                    
                    @if($errors->any())
                        <ul class="mt-6">
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </form>
        </main>
    </section>
</x-layout>