<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <x-dropdown>
            <x-slot name="trigger">
                <button @click="show=!show" class="py-2 pl-3 pr-9 text-sm font-semibold inline-flex">{{ $mainCategory->name ?? 'Categories' }}
                    <x-svg>
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                            <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </x-svg>
                </button>
            </x-slot>
            <x-dropdown-item href="/" class="{{ empty(request('category')) ? 'bg-blue-500 text-white' : '' }}">All</x-dropdown-item>
            @foreach ($categories as $category)
                <x-dropdown-item 
                    href="/?category={{ $category->name }}&{{ http_build_query(request()->except('category','page')) }}" 
                    class="{{ isset($mainCategory) && $mainCategory->is($category) ? 'bg-blue-500 text-white' : '' }}">{{ $category->name }}
                </x-dropdown-item>
            @endforeach
        </x-dropdown>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <x-search></x-search>
        </div>
        {{ isset($message) ? $message : '' }}
    </div>
</header>