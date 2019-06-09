<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects/index', [
            'projects' => Project::all()
        ]);
    }
}
