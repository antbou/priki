@extends('layout')
@section('title', 'Références')
@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">
        @foreach (App\Models\Reference::all() as $reference)
            <article class="text-3xl rounded overflow-hidden border-solid border-2 my-6 px-6 py-4">
                {{ $reference->description }}
                <a target="_blank"
                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                    href="{{ $reference->url }}">{{ Str::limit($reference->url, $limit = 25) }}</a>
            </article>
        @endforeach
    </article>
@endsection
