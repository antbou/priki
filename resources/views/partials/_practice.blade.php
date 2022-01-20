<h2 class="mt-2 pt-8 text-sm text-gray-500">
    Créé le {{ $practice->created_at->isoformat('D MMMM Y') }},
    mis à jours le {{ $practice->updated_at->isoformat('D MMMM Y à HH:mm') }}
</h2>
<p class="mt-4 text-lg">
    @if (isset($truncate))
        {{ \Illuminate\Support\Str::words($practice->description, 100, $end = ' ...') }}
    @else
        {{ $practice->description }}
    @endif

    @if (!isset($hideLink))
        <br><a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600"
            href="{{ route('practice', ['id' => $practice->id]) }}">Plus de détail</a>
    @endif
</p>
@if (!isset($hideDomain))
    <span
        class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-pink-100 bg-pink-600 rounded-full">
        {{ $practice->domain->name }}
    </span>
@endif
@if (isset($showState) && $showState)
    <span
        class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-pink-100 bg-blue-600 rounded-full">
        {{ $practice->state()->first()->name }}
    </span>
@endif
