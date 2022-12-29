<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BusinessSetting;

class WebController extends Controller
{
    public function index(){
        $recentProjects = Project::where('status', '!=', 'started')->orderBy('endDate', 'desc')->get();
        $companyContact = BusinessSetting::where('businessName', 'contact')->first()->businessValue;
        return view('index', compact('recentProjects', 'companyContact'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function services(){
        return view('services');
    }
}
