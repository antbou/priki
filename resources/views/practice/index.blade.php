<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">

        @foreach ($domains as $domain)

            <h3 class="bg-white p-5 border-2 rounded-lg mt-5 bold text-center">
                {{ App\Models\Domain::find($domain->first()->domain_id)->name }} :
            </h3>

            @forelse ($domain as $practice)
                @include('partials._practice', [
                'link' => true, 'truncate' => true, 'showState' => true, 'hideDomain' => true
                ])
            @empty
                <h3 class="mt-4 text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
            @endforelse
        @endforeach

    </article>
</x-app-layout>
