<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">
        @foreach ($domains as $domain)
            <h3 class="bg-white p-5 border-2 rounded-lg mt-5 bold text-center">
                {{ $domain->name }} :
            </h3>

            @forelse ($domain->practices as $practice)
                @include('practice._practice', [
                'truncate' => true, 'showState' => true, 'hideDomain' => true
                ])
            @empty
                <h3 class="mt-4 text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
            @endforelse
        @endforeach
    </article>
</x-app-layout>
