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
            @foreach ($project->tasks as $task)
                <div>
                    {{-- Both viable options for the form endpoint--}}
                    {{-- PATCH /projects/id/tasks/id --}}
                    {{-- PATCH /tasks/id --}}
                    <form method="POST" action="/tasks/{{ $task->id }}">

                        @method('PATCH')
                        @csrf

                        <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <p>There are no tasks for this project.</p>
        </div>
    @endif
@endsection
