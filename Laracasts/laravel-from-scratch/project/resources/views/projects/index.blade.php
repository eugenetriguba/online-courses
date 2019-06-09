@extends('layouts/layout')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    <ul>
        @foreach ($projects as $project)
            <li>{{ $project->title }}: {{ $project->description }}</li>
        @endforeach
    </ul>
@endsection