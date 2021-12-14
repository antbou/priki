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

    </article>
@endsection
