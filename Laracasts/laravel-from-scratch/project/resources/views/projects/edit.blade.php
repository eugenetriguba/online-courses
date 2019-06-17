@extends('layouts/layout')

@section('title', 'Edit a Project')

@section('content')
    <h1 class="title">Edit Project

    <form action="/projects/{{ $project->id }}" method="POST" style="margin-bottom: 1rem">

        @method('PATCH')
        @csrf

        <div class="field">
            <label for="title" class="label">Title</label>
        </div>

        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            
            <div class="control">
                <textarea name="description" id="" cols="30" rows="10" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Update Project</button>
            </div>
        </div>
    </form>

    @include('errors')

    <form action="/projects/{{ $project->id }}" method="POST">

        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button class="button" type="submit">Delete Project</button>
            </div>
        </div>

    </form>
@endsection
