<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;



class ProjectController extends Controller
{
    public function index(){
        return view('admin.projects.index');
    }

    public function show(Project $project){
        return view('admin.projects.show', compact('project'));
    }

    public function fetchProjects(Request $request){
        $projects = QueryBuilder::for(Project::class)->allowedFilters(['location', 'type'])->paginate(10)->withQueryString();
        if(count($projects) > 0){
            return response()->json([
                "projects" => $projects,
            ], 200);
        }
        else{
            return response()->json([
                "errors" => ["No more pages"],
            ], 422);
        }
    }
}