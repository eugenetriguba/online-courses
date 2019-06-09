@extends('layouts/layout')

@section('title', 'Create a New Project')

@section('content')
    <h1>Create a new project</h1>

    <form method="POST" action="/projects">
        {{ csrf_field() }}

        <div>
            <input type="text" name="title" placeholder="Project title">
        </div>
        
        <div>
            <textarea name="description" placeholder="Project description"></textarea>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection