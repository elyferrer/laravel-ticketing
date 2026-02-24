<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Mail\TicketAssignmentMail;
use App\Models\Project;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(Project $project): View
    {
        $tickets = Ticket::with([
            'project', 
            'status', 
            'assignee', 
            'createdBy'
        ]);

        $conditions = [
            'project_id' => $project->id
        ];

        if (UserTypeEnum::tryFrom(Auth::user()->user_type_id) !== UserTypeEnum::ADMIN) {
            $conditions['assignee_id'] = Auth::user()->id;
        }

        $tickets->where($conditions);
        
        $tickets = $tickets->get();

        return view('tickets.index', compact('project', 'tickets'));
    }

    public function projects(): View
    {
        $projects = Project::all();

        return view('tickets.projects', compact('projects'));
    }

    public function create(Project $project): View
    {
        $users = User::all();
        $statuses = Status::all();

        return view('tickets.create', compact('project', 'users', 'statuses'));
    }

    public function store(Project $project)
    {
        $fields = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status_id' => ['required'],
            'assignee_id' => ['required'],
        ]);

        $fields['created_by'] = Auth::user()->id;
        $fields['project_id'] = $project->id;
        
        $ticket = Ticket::create($fields);
        if (! $ticket) {
            abort(500);
        }

        $user = User::where('id', $ticket->assignee_id)->first();
        
        Mail::to($user->email)->queue(
            new TicketAssignmentMail($user, $project, $ticket)
        );

        return redirect()->route('projects.show', ['project' => $project]);
    }

    public function show(Project $project, Ticket $ticket)
    {
        return view('tickets.show', compact('project', 'ticket'));
    }

    public function edit(Project $project, Ticket $ticket)
    {
        $users = User::all();
        $statuses = Status::all();

        return view('tickets.edit', compact('project', 'ticket', 'users', 'statuses'));
    }

    public function update(Project $project, Ticket $ticket)
    {
        $fields = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status_id' => ['required'],
            'assignee_id' => ['required'],
        ]);

        if (! $ticket->update($fields)) {
            throw new \Exception('There was an error processing your request', 500);
        }

        return redirect()->route('tickets.show', compact('project', 'ticket'));
    }

    public function destroy(Project $project, Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('projects.show', ['project' => $project]);
    }
}
