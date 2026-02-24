<?php

use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class, 'project_id');
            $table->foreignIdFor(Status::class, 'status_id');
            $table->foreignIdFor(User::class, 'assignee_id')->nullable();
            $table->foreignIdFor(User::class, 'created_by');
            $table->string('name', 255);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
