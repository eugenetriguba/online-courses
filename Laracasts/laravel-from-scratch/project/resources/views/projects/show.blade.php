@extends('layouts/layout')

@section('title', 'Project Details')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">
        {{ $project->description }}

        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>
    </div>

    @if ($project->tasks->count())
        <div>
            <ul>
                @foreach ($project->tasks as $task)
                    <li>{{ $task->description }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div>
            <p>There are no tasks for this project.</p>
        </div>
    @endif
@endsection
