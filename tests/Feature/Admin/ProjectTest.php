<?php

use function Pest\Laravel\actingAs;

test('if admin can access projects dashboard', function () {
    actingAs(asAdmin())
        ->get(route('projects.index'))
        ->assertStatus(200);
});
