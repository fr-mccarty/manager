<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        echo("Running Database Seeder for " . env('APP_NAME'));
        $this->destroyWorld();
        $this->createWorld();

        echo("\n");
    }

    public function destroyWorld()
    {
        echo("\nDestroying the " . env('APP_NAME') . " world as we know it...");

        //Different from DB::raw, unprepared allows multiline sql statements
        DB::unprepared('
            SET FOREIGN_KEY_CHECKS = 0;

            TRUNCATE users;
            TRUNCATE teams;

            SET FOREIGN_KEY_CHECKS = 1;
            ');
    }

    public function createWorld()
    {
        echo("\nCreating world for " . env('APP_NAME') . "\n");

        $this->josh = User::create([
            'email' => 'fr.mccarty@gmail.com',
            'name' => 'Josh McCarty',
            'password' => bcrypt('abc123'),
            'email_verified_at' => now(),
        ]);

        $team = Team::create([
            'name' => 'checktrack.io team',
            'user_id' => $this->josh->id,
            'personal_team' => 1,
        ]);

        // Team owners don't need an entry in the team_user table

    }
}
