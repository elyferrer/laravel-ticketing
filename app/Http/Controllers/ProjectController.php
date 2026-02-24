<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store()
    {
        $fields = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'code' => ['required'],
        ]);

        $fields['created_by'] = Auth::user()->id;
        
        if (! Project::create($fields)) {
            abort(500);
        }

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
