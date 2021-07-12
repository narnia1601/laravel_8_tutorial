@props(['categories', 'mainCategory'])
<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    <div x-data="{ show: false }" class="py-0.5" @click.away='show = false'>
        {{ $trigger }}
        <div x-show="show" class="py-2 bg-gray-100 w-full mt-2 rounded-xl">
        {{ $slot }}
        </div>
    </div>
</div>