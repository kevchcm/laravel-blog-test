@props([
    'currentCategory'
])

<div class="relative lg:inline-flex items-center">
    <div x-data="{ show: false }">
        <div
            @click="show = !show"
            @click.away="show = false">
            {{ $trigger }}
        </div>
        
        <div x-show="show" class="absolute bg-gray-100 w-full mt-2 rounded-xl z-40 max-h-52 overflow-auto" style="display: none">
            {{ $slot }}
        </div>
    </div>
</div>