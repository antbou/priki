<article class="text-3xl max-w-prose mx-auto py-8">
    @if (Session::has('flash_message'))
        <x-alert type="{{ Session::get('flash_type') }}" :message="Session::get('flash_message')"
            class="mb-4" />
    @endif
    <div class="flex justify-around pb-8">
        <h1 class="flex-auto text-5xl font-bold">Pratiques</h1>
        <div class="m-auto text-sm">

            <label for="day">Nouveau de {{ $days }} jours</label>
            <input wire:model="days" class="border-2 border-light-gray-900 text-center timeSelection" type="number"
                id="day" name="day" min="0" max="100">
        </div>
    </div>
    @forelse ($practices as $practice)
        @include('practice._practice', ['truncate' => true])
    @empty
        <h3 class="mt-4 text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
    @endforelse

</article>
