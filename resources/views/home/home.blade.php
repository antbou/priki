@extends('layout')

@section('content')
    <div class="space-y-6 ...">
        <h2>Pratiques :</h2>
        @foreach ($practices as $practice)
            <br>
            <b>Créé le {{ $practice->created_at->isoformat('d MMMM Y') }}</b>
            <p>{{ $practice->description }} </p>
            <b>{{ $practice->domain->name }}</b>
            <br>
        @endforeach
    </div>
@endsection
