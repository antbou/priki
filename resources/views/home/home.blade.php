@extends('layout')

@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">
        <h1 class="text-5xl font-bold pb-8">Pratiques :</h1>

        @forelse  ($practices as $practice)
            <h2 class="mt-2 pt-8 text-sm text-gray-500">Créé le {{ $practice->created_at->isoformat('d MMMM Y') }},</h2>
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
