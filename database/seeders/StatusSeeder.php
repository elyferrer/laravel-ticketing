<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['name' => 'Open', 'description' => 'Created but not assigned yet']);
        Status::create(['name' => 'In Progress', 'description' => 'Created and was already assigned']);
        Status::create(['name' => 'On hold', 'description' => 'Needs clarification']);
        Status::create(['name' => 'Done', 'description' => 'Task was done']);
        Status::create(['name' => 'Closed', 'description' => 'Task was already solved or could be a duplicate']);
    }
}
