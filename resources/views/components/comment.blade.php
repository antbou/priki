@props(['username', 'description'])

<div class="container px-5 mx-auto flex flex-wrap">
    <div class="flex flex-wrap w-full py-2 border-2 rounded-lg mt-3">
        <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider font-bold">
                {{ $username }}</h2>
            <p class="leading-relaxed text-sm">{{ $description }}</p>
        </div>
    </div>
</div>
