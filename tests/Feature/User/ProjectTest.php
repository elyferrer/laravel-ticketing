<?php

use function Pest\Laravel\actingAs;

test('if user can access projects dashboard', function () {
    actingAs(asUser())
        ->get(route('projects.index'))
        ->assertStatus(403);
});

test('if user can access create project page', function () {
    actingAs(asUser())
        ->get(route('projects.create'))
        ->assertStatus(403);
});