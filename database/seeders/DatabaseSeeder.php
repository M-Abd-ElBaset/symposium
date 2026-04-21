<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'Mohamed Elgebaly',
                'email' => 'mohamedelgebaly1996@gmail.com',
            ]);

        Conference::factory()->count(5)->create();
    }
}
