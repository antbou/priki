@extends('layout')
@section('title', 'HomePage')
@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">
        {{ $user->fullname }}
        <h2 class="mt-2 pt-8 text-sm text-gray-500">
            Créé le {{ $practice->created_at->isoformat('D MMMM Y') }},
            mis à jours le {{ $practice->updated_at->isoformat('D MMMM Y à HH:mm') }}
        </h2>
        <p class="mt-4 text-lg">{{ $practice->description }}
        </p>

        @if (!isset($hideDomain))
            <span
                class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-pink-100 bg-pink-600 rounded-full">
                {{ $practice->domain->name }}
            </span>
        @endif

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
