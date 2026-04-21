<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('a user can update their talk', function () {
    $talk = Talk::factory()->create();

    $response = $this
        ->actingAs($talk->author)
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => 'New Title here',
            'type' => TalkType::KEYNOTE->value,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('talks.show', ['talk' => $talk]));

    $this->assertEquals('New Title here', $talk->refresh()->title);
});


test('a user cannot update another users talk', function () {
    $talk = Talk::factory()->create();
    $otherUser = User::factory()->create();
    $originalTitle = $talk->title;

    $response = $this
        ->actingAs($otherUser)
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => 'New Title here',
            'type' => TalkType::KEYNOTE->value,
        ]);

    $response->assertForbidden();

    $this->assertEquals($originalTitle, $talk->refresh()->title);
});
