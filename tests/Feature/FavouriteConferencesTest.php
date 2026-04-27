<?php

use App\Models\Conference;
use App\Models\User;

test('it_favourites_a_conference', function () {
    $conference = Conference::factory()->create();

    $response = $this
        ->actingAs($user = User::factory()->create())
        ->post(route('conferences.favourite', ['conference' => $conference]));

    $this->assertCount(1, $user->favouritedConferences);
    $this->assertTrue($user->favouritedConferences->pluck('id')->contains($conference->id));
});

test('it_unfavourites_a_conference', function () {
    $conference = Conference::factory()->create();

    $user = User::factory()->create();
    $user->favouritedConferences()->attach($conference);

    $response = $this
        ->actingAs($user)
        ->delete(route('conferences.unfavourite', ['conference' => $conference]));

    $this->assertCount(0, $user->favouritedConferences);
});
