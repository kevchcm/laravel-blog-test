<x-dropdown :currentCategory="$current ?? null">
    <x-slot:trigger>
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            
            {{ !is_null($currentCategory) ? ucfirst($currentCategory->name) : 'Categories' }}
            
            <x-icons name="arrow"/>
        </button>
    </x-slot:trigger>
    
    @if(!is_null($currentCategory))
        <x-dropdown-item href="/">
            All
        </x-dropdown-item>
    @endif
    
    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category')) }}"
            :active="!is_null($currentCategory) && $currentCategory->is($category)"
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>