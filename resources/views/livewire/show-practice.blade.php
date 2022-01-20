<article class="text-3xl max-w-prose mx-auto py-8">
    @if (Session::has('flash_message'))

        <div class="text-md {{ Session::get('flash_type') }}">
            <h3>{{ Session::get('flash_message') }}</h3>
        </div>

    @endif
    <div class="flex justify-around pb-8">
        <h1 class="flex-auto text-5xl font-bold">Pratiques</h1>
        <div class="m-auto text-sm">

            @if ($model == 'days')
                <label for="day">Nouveau de {{ $days }} jours</label>
                <input wire:model="{{ $model }}" class="border-2 border-light-gray-900 text-center timeSelection"
                    type="number" id="day" name="day" min="1" max="100">
            @endif
        </div>
    </div>
    @forelse ($practices as $practice)
        @include('partials._practice', ['truncate' => true])
    @empty
        <h3 class="mt-4 text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
    @endforelse

</article>
