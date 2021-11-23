@extends('layout')

@section('content')
    <h1>Hello</h1>
    @foreach (\App\Models\Role::all() as $role)
        <p>{{ $role->name }}</p>
    @endforeach
@endsection
