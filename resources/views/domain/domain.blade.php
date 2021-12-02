@extends('layout')
@section('title', 'HomePage')
@section('content')
    <article class="text-3xl max-w-prose mx-auto py-8">
        <div class="flex justify-around pb-8">
            <h1 class="flex-auto text-5xl font-bold">Pratiques
                {{ isset($domain) ? $domain->name : 'de tous les domaines' }}
            </h1>
        </div>
        @include('_practice')
    </article>
@endsection
