<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Ticket;
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

    public function show(Project $project)
    {
        $tickets = Ticket::where('project_id', $project->id)->with([
            'project', 
            'status', 
            'assignee', 
            'createdBy'
        ])->get();

        return view('projects.show', compact('project', 'tickets'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $fields = request()->validate([
            'name' => [''],
            'description' => [''],
            'code' => [''],
        ]);

        if (! $project->update($fields)) {
            throw new \Exception('There was an error processing your request', 500);
        }

        return redirect()->route('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
