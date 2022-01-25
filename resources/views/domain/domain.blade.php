<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">
        <div class="flex justify-around pb-8">
            <h1 class="flex-auto text-5xl font-bold">Pratiques
                {{ isset($domain) ? $domain->name : 'de tous les domaines' }}
            </h1>
        </div>
        @forelse ($practices as $practice)
            @include('practice._practice', ['link' => true, 'truncate' => true])
        @empty
            <h3 class="mt-4 text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
        @endforelse
    </article>
</x-app-layout>
