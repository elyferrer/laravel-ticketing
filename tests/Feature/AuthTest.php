<?php

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{assertAuthenticated, assertDatabaseHas, post, get};

uses(RefreshDatabase::class);

function admin() {
    return User::factory()->admin()->create();
}

test('that the login page exists', function () {
    $response = get('/login');

    $response->assertStatus(200);
});

test('that the registration page exists', function () {
    $response = get('/register');

    $response->assertStatus(200);
});

test('that the user successfully registers', function () {
    $fields = [
        'name' => 'John Doe',
        'email' => 'johndoe@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'user_type_id' => UserTypeEnum::ADMIN->value
    ];

    $response = post(route('register.store'), $fields);

    $response->assertSessionDoesntHaveErrors();

    assertDatabaseHas('users', [
        'email' => $fields['email']
    ]);

    assertAuthenticated();
});

test('that the user successfully logs in', function () {
    $response = post(route('login.store'), [
        'email' => admin()->email,
        'password' => 'password'
    ]);

    assertAuthenticated();
    $response->assertRedirect(route('home'));
});
