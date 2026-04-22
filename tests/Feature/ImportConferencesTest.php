<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it imports a conference', function () {
    $command = new ImportConferences();

    $data = [
        'name'=> 'This is the name from the API',
        'dateCfpStart' => "2026-03-17T05:04:20+00:00",
        'dateCfpEnd' => "2026-09-01T00:00:00+00:00",
        'dateEventStart' => "2026-09-23T22:00:00+00:00",
        'dateEventEnd' => "2026-09-24T22:00:00+00:00",
        'location' => "Guadalajara, Spain",
        'description' => "",
        '_rel'=>['cfp_uri' => 'v1/cfp/oijidsf8238r'],
    ];

    $command->importOrUpdateConference($data);

    $conference = Conference::first();
    $this->assertEquals($conference->title, $data['name']);
});

test('it updates a conference', function () {
    Conference::create([
        'title'=> 'Original DB name',
        'starts_at' => "2026-09-23T22:00:00+00:00",
        'ends_at' => "2026-09-24T22:00:00+00:00",
        'cfp_starts_at' => "2026-03-17T05:04:20+00:00",
        'cfp_ends_at' => "2026-09-01T00:00:00+00:00",
        'callingallpapers_id'=>"v1/cfp/oijidsf8238r"
    ]);

    $command = new ImportConferences();

    $data = [
        'name'=> 'This is the name from the API',
        'dateCfpStart' => "2026-03-17T05:04:20+00:00",
        'dateCfpEnd' => "2026-09-01T00:00:00+00:00",
        'dateEventStart' => "2026-09-23T22:00:00+00:00",
        'dateEventEnd' => "2026-09-24T22:00:00+00:00",
        'location' => "Guadalajara, Spain",
        'description' => "",
        '_rel'=>['cfp_uri' => 'v1/cfp/oijidsf8238r'],
    ];

    $command->importOrUpdateConference($data);

    $conference = Conference::first();
    $this->assertEquals($conference->title, $data['name']);
    $this->assertEquals(1, Conference::count());
});
