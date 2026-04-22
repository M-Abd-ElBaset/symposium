<?php

namespace App\Console\Commands;

use App\Models\Conference;
use App\Services\CallingAllPapers;
use Illuminate\Console\Command;

class ImportConferences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfps:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CallingAllPapers $cfps)
    {
        foreach ($cfps->conferences() as $conference)
        {
            $this->importOrUpdateConference($conference);
        }
    }

    public function importOrUpdateConference(array $conference)
    {
        Conference::updateOrCreate(
            ['callingallpapers_id' => $conference['_rel']['cfp_uri']],
            [
                'title' => $conference['name'],
                'starts_at' => $conference['dateEventStart'],
                'ends_at' => $conference['dateEventEnd'],
                'cfp_starts_at' => $conference['dateCfpStart'],
                'cfp_ends_at' => $conference['dateCfpEnd'],
                'location' => $conference['location'] ?? null,
                'url' => $conference['eventUri'] ?? null,
                'description' => $conference['eventUri'] ?? null,
            ]
        );
    }

    //cfp array
/*[
    "name" => "HoneyCON26"
    "uri" => "https://papercall.io/cfps/6611/submissions/new"
    "dateCfpStart" => "2026-03-17T05:04:20+00:00"
    "dateCfpEnd" => "2026-09-01T00:00:00+00:00"
    "location" => "Guadalajara, Spain"
    "latitude" => 40.74
    "longitude" => -2.50593
    "description" => ""
    "dateEventStart" => "2026-09-23T22:00:00+00:00"
    "dateEventEnd" => "2026-09-24T22:00:00+00:00"
    "iconUri" => "https://papercallio-production.s3.amazonaws.com/uploads/event/logo/7310/mid_300_Logopequeno.jpg"
    "eventUri" => "https://honeysec.info"
    "timezone" => "Europe/Madrid"
    "tags" => array:6 [
    0 => ""
    1 => "Ciberseguridad"
    2 => "Hacking"
    3 => "Congreso"
    4 => "Guadalajara"
    5 => "España"
    ]
    "sources" => array:1 [
    0 => "papercallio"
    ]
    "lastChange" => "2026-03-17T05:04:23+00:00"
    "_rel" => array:1 [
    "cfp_uri" => "v1/cfp/02139a305befce1f6b3f3dad4122b9bbdc1aa9df"
    ]
]*/
}
