<?php

use function Pest\Laravel\actingAs;

test('that a non-admin user cannot view the projects\' dashboard', function () {
    actingAs(asUser())
        ->get(route('projects.index'))
        ->assertStatus(403);
});

test('that a non-admin user cannot view the create new project page', function () {
    actingAs(asUser())
        ->get(route('projects.create'))
        ->assertStatus(403);
});

test('that a non-admin user cannot create a new project', function () {
    actingAs(asUser())
        ->get(route('projects.store'))
        ->assertStatus(403);
});

test('that a non-admin user cannot view the project details page', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs(asUser())
        ->get(route('projects.show', ['project' => $project]))
        ->assertStatus(403);
});

test('that a non-admin user cannot view the edit project page', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs(asUser())
        ->get(route('projects.edit', ['project' => $project]))
        ->assertStatus(403);
});

test('that a non-admin user cannot update a project', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs(asUser())
        ->patch(route('projects.update', ['project' => $project]))
        ->assertStatus(403);
});

test('that a non-admin user cannot delete a project', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs(asUser())
        ->delete(route('projects.destroy', ['project' => $project]))
        ->assertStatus(403);
});