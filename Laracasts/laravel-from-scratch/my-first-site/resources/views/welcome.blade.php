@extends('layout')

@section('title', 'Welcome')

@section('content')
    <h1>My {{ $pageName }} website</h1>

    <p>Name request: {{ request('name') }}</p>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
@endsection