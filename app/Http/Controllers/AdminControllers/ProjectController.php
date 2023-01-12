<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
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

    public function create(){
        return view('admin.projects.create');
    }

    public function store(CreateProjectRequest $request){
        Project::create($request->validated());
        Toastr::success('Successfully', 'Create Project Successfull');
        return redirect()->back();
    }

    public function update(UpdateProjectRequest $request, Project $project){
        $project->update($request->validated());
        Toastr::success('Updated. Project information updated');
        return redirect()->back();
    }

    public function fetchProjects(Request $request){
        $projects = QueryBuilder::for(Project::class)
            ->allowedFilters(['location', AllowedFilter::exact('category_id')])
            ->with('category')
            ->paginate(10)
            ->withQueryString();
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