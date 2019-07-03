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
        <div class="box">
            @foreach ($project->tasks as $task)
                <div>
                    {{-- Both viable options for the form endpoint--}}
                    {{-- PATCH /projects/id/tasks/id --}}
                    {{-- PATCH /tasks/id --}}
                    <form method="POST" action="/completed-tasks/{{ $task->id }}">

                        @if ($task->completed)
                            @method('DELETE')
                        @endif
                        
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
        <div class="box">
            <p>There are no tasks for this project.</p>
        </div>
    @endif

    <form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">

        @csrf

        <div class="field">
            <label for="description" class="label">New Task</label>

            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Add Task</button>
            </div>
        </div>

        @include('errors')

    </form>
@endsection
