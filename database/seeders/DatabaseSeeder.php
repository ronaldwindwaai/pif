<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Resource::factory(10)->create();
        \App\Models\Project::factory(35)
            ->create()
            ->each(function ($project) {
                $random_resource = Resource::all()->random()->pluck('id');
                $project->resources()->attach($random_resource);
            });
            \App\Models\Support::factory(15)->create();
    }
}
