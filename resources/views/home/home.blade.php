@extends('layout')
@section('title', 'HomePage')
@section('content')

    @livewire('show-practice', ['model' => 'days'])

@endsection
