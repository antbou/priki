@extends('layout')
@section('title', 'HomePage')
@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">

        <div class="flex justify-around pb-8">
            <h1 class="flex-auto text-5xl font-bold">Pratiques</h1>
            <div class="m-auto text-sm">
                <label for="day">Sorti ces derniers jours ;</label>
                <input class="border-2 border-light-gray-900 text-center timeSelection" type="number" id="day" name="day"
                    min="0" max="100">
            </div>
        </div>
        @forelse  ($practices as $practice)
            <h2 class="mt-2 pt-8 text-sm text-gray-500">
                Créé le {{ $practice->created_at->isoformat('D MMMM Y') }},
                mis à jours le {{ $practice->updated_at->isoformat('D MMMM Y à HH:mm') }}
            </h2>
            <p class="mt-4 text-lg">{{ $practice->description }} </p>
            <span
                class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-pink-100 bg-pink-600 rounded-full">
                {{ $practice->domain->name }}
            </span>
        @empty
            <h3 class="text-blue-600 md:text-red-600">Aucune bonne pratique</h3>
        @endforelse
    </article>
@endsection
