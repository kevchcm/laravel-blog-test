<x-layout>
    <x-dashboard heading="Create new post">
        
        <div class="bg-gray-100 border border-black border-opacity-5 rounded-xl">
            <form method="POST" action="{{ route('post-store') }}" enctype="multipart/form-data" class="p-6">
                @csrf
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Title
                        
                        <input
                            name="title"
                            type="text"
                            value="{{ old('title') }}"
                            class="border border-gray-400 p-2 w-full"
                            required
                        >
                        
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Slug
                        
                        <input
                            name="slug"
                            type="text"
                            value="{{ old('slug') }}"
                            class="border border-gray-400 p-2 w-full"
                            required
                        >
                        
                        @error('slug')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Thumbnail
                        
                        <input
                            name="thumbnail"
                            type="file"
                            value="{{ old('thumbnail') }}"
                            class="border border-gray-400 p-2 w-full"
                            required
                        >
                        
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <label for="excerpt" class="block uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Excerpt
                        
                        <textarea
                            name="excerpt"
                            rows="5"
                            class="resize-none w-full border border-gray-400 p-2 text-sm"
                            required
                        >{{ old('excerpt') }}</textarea>
                        
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <label for="body" class="block uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Body
                        
                        <textarea
                            name="body"
                            rows="5"
                            class="resize-none w-full border border-gray-400 p-2 text-sm"
                            required
                        >{{ old('body') }}</textarea>
                        
                        @error('body')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <label for="category_id" class="block uppercase font-bold text-xs text-gray-700 [&:not(:first-child)]:mt-6">
                        Category
                        
                        <select name="category_id" id="category" class="block w-full">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }} {{ old('category_id') == $category->id ? 'selected' : '' }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        
                        @error('category')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </label>
                    
                    <div class="mt-10">
                        <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    
    </x-dashboard>
</x-layout>