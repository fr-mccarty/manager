<?php

namespace Database\Seeders;

use App\Models\App;
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

        $this->joe = User::create([
            'email' => 'joe@lolekproductions.org',
            'name' => 'Joe Sterett',
            'password' => bcrypt('abc123'),
            'email_verified_at' => now(),
        ]);
    }
}
