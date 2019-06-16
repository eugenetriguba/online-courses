<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $description = request()->validate(['description' => ['required', 'max: 255']]);

        $project->addTask($description);

        return back();
    }

    public function update(Task $task)
    {
        request()->has('completed') ? $task->complete() : $task->incomplete();

        return back();
    }
}
