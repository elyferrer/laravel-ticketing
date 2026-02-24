<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    protected $fillable = ['project_id', 'status_id', 'assignee_id', 'created_by', 'name', 'description'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function assignee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'assignee_id');
    }

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
