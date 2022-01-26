@props(['opinion', 'footer'])

<article class="text-3xl rounded bg-white overflow-hidden border-solid border-2 my-6 px-6 py-4">
    <div class="flex flex-row mb-2">
        <a class="font-bold text-base" href="">{{ $opinion->user()->fullname }}</a>
        <p class="text-base text-gray-500">
            &nbsp; Créé le {{ $opinion->created_at->isoformat('D MMMM Y') }},
        </p>
    </div>
    <p class="text-gray-700 text-lg mt-1">
        {{ $opinion->description }}
    </p>
    <div class="text-sm mt-2">
        <i class="far fa-thumbs-up"></i>{{ $opinion->comments->where('points', '=', 1)->count() }}
        <i class="far fa-thumbs-down"></i>{{ $opinion->comments->where('points', '=', -1)->count() }}
    </div>

    {{ $slot }}

</article>
