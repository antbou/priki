@props(['practice', 'truncate' => false, 'link' => false])

<h2 class="mt-2 pt-8 text-sm text-gray-500">
    Créé le {{ $practice->created_at->isoformat('D MMMM Y') }},
    mis à jours le {{ $practice->updated_at->isoformat('D MMMM Y à HH:mm') }}
</h2>

<h2>{{ $practice->title }}</h2>
@isset($headers)
    {{ $headers }}
@endisset
<p class="mt-4 text-lg">
    @if ($truncate)
        {{ \Illuminate\Support\Str::words($practice->description, 100, $end = ' ...') }}
    @else
        {{ $practice->description }}
    @endif

    @if ($link)
        <br><a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600"
            href="{{ route('practice', ['id' => $practice->id]) }}">Plus de détail</a>
    @endif
</p>
@isset($tags)
    {{ $tags }}
@endisset
