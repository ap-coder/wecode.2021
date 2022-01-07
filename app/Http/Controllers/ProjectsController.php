<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::published()->get();
        $categories = Category::get();

        return view('site.project.index', compact('projects','categories'));
    }

    
    public function show(Project $project, $slug)
    {
        dd($slug);
    }
}
