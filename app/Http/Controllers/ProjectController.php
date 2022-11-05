<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $recentProjects = Project::where('status', '!=', 'started')->orderBy('endDate', 'desc')->get();
        return view('projects', compact('recentProjects'));
    }

    public function show(Project $project){
        return view('view_project', compact('project'));
    }
}
