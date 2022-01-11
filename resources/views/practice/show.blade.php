@extends('layout')
@section('title', 'Détails de #' . $practice->id)
@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">
        {{ $user->fullname }}

        @include('_practice')
        <i class="far fa-thumbs-up"></i>
        <i class="far fa-thumbs-down"></i>
        <div class="font-bold text-xl mb-2 pt-6">Commentaires ({{ count($opinions) }})</div>
        @foreach ($opinions as $opinion)
            <article class="text-3xl rounded overflow-hidden border-solid border-2 my-6 px-6 py-4">
                <div class="font-bold text-base mb-2">
                    {{ $opinion->user()->fullname }}
                </div>
                <h2 class="mt-2 ptb-1 text-sm text-gray-500">
                    Créé le {{ $opinion->created_at->isoformat('D MMMM Y') }},

                </h2>
                <p class="text-gray-700 text-base">
                    {{ $opinion->description }}
                </p>
            </article>
        @endforeach
    </article>
@endsection
