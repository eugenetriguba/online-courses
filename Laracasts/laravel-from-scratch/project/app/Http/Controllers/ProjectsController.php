<?php

namespace App\Http\Controllers;

use Mail;
use App\Project;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // auth()->id() // 4
        // auth()->user() // User
        // auth()->check() //boolean
        // auth()->guest() // boolean

        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        // about_if()
        // about_unless
        // about_unless(\Gate::denies('update', $project), 403);
        // Can also handle authorization through blade files (conditional)
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255']
        ]);

        $project->update($attributes);

        return redirect('/projects');
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        Mail::to(auth()->user()->email)->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }
}
