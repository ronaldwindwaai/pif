<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesAndPermissionsSeeder::class]);
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create(
            [
                'name' => 'Ronald Windwaai',
                'email' => 'ronaldwindwaai@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
            ]
        );
        \App\Models\Programme::factory(5)->create();
        \App\Models\Project::factory(15)->create();
        \App\Models\Resource::factory(10)->create();
        \App\Models\Meeting::factory(35)
            ->create()
            ->each(function ($meeting) {
                $random_resource = Resource::all()->random()->pluck('id');
                $meeting->resources()->attach($random_resource);
            });
            \App\Models\Support::factory(15)->create();

        \App\Models\Meeting::factory(30)->create();
        \App\Models\Recording::factory(20)->create();
        \App\Models\Participant::factory(20)->create();
    }
}
