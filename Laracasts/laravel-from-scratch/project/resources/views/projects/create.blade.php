@extends('layouts/layout')

@section('title', 'Create a New Project')

@section('content')
    <h1 class="title">Create a new project</h1>

    <form method="POST" action="/projects">

        @csrf

        <div class="field">
            <label for="title" class="label">Title</label>
        </div>
        <div class="control" style="margin-bottom: 1rem">
            <input type="text" name="title" placeholder="Project title" class="input">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
        </div>
        <div class="control" style="margin-bottom: 1rem">
            <textarea name="description" placeholder="Project description" class="textarea"></textarea>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection
