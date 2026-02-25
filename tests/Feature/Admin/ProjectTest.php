<?php

use function Pest\Laravel\actingAs;

test('that an admin can view the projects\' dashboard', function () {
    actingAs(asAdmin())
        ->get(route('projects.index'))
        ->assertStatus(200);
});

test('that an admin can view the create new project page', function () {
    actingAs(asAdmin())
        ->get(route('projects.create'))
        ->assertStatus(200);
});

test('that an admin can create new project', function () {
    $admin = asAdmin();

    $fields = [
        "name" => "Test Project",
        "description" => "Test description for the test project",
        "code" => "TEST",
    ];

    actingAs($admin)
        ->post(route('projects.store'), $fields)
        ->assertRedirect(route('projects.index'));
});

test('that an admin can view the project details page', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs($admin)
        ->get(route('projects.show', ['project' => $project]))
        ->assertStatus(200);
});

test('that an admin can view the edit project page', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs($admin)
        ->get(route('projects.edit', ['project' => $project]))
        ->assertStatus(200);
});

test('that an admin can update a project', function () {
    $admin = asAdmin();
    $project = createProject($admin);
    $updateFields = ['description' => 'Updated description for test'];

    actingAs($admin)
        ->patch(route('projects.update', ['project' => $project]), $updateFields)
        ->assertRedirect(route('projects.show', ['project' => $project]));
});

test('that an admin can delete a project', function () {
    $admin = asAdmin();
    $project = createProject($admin);

    actingAs($admin)
        ->delete(route('projects.destroy', ['project' => $project]))
        ->assertRedirect(route('projects.index'));
});