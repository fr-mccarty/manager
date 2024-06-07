<?php

namespace Database\Seeders;

use App\Models\App;
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
            TRUNCATE apps;

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

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Sheet Music',
            'description' => 'Upload scanned images of your music, digest them into pieces, and then weave them together for a great liturgical event.',
            'content' => 'More information about the app.',
            'is_active' => 1,
            'font_awesome' => 'music',
            'custom_logo' => null,
            'url' => 'music',
            'public_url' => 'https://music.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Marriage Preparation',
            'description' => 'Track the marriage preparation for all the couples in your parish',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'user',
            'custom_logo' => null,
            'url' => 'music',
            'public_url' => 'https://marriage.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Team Feedback',
            'description' => 'Track the marriage preparation for all the couples in your parish',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'bullhorn',
            'custom_logo' => null,
            'url' => 'feedback',
            'public_url' => 'https://feedback.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Newman Center Database',
            'description' => 'A Catholic Center Database designed to help connect students, alumni, and friends',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'graduation-cap',
            'custom_logo' => null,
            'url' => 'newman',
            'public_url' => 'https://newman.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Document Recipe',
            'description' => 'A tool for creating collections of pdfs that need to be printed out for various circumstances',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'file',
            'custom_logo' => null,
            'url' => 'document',
            'public_url' => 'https://document.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'IdeaSync',
            'description' => 'Capture your ideas on the Go and share them with your team',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => null,
            'custom_logo' => null,
            'url' => 'ideasync',
            'public_url' => 'https://ideasync.io',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Ongoing Formation',
            'description' => 'Capture your ideas on the Go and share them with your team',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'school',
            'custom_logo' => null,
            'url' => 'formation',
            'public_url' => 'https://formation.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Navigator',
            'description' => 'Organize and share your links with your team',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'location-arrow',
            'custom_logo' => null,
            'url' => 'navigator',
            'public_url' => 'https://navigator.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Wedding and Funeral Readings',
            'description' => 'Select readings for the wedding or for the funeral which are coming up.  Click print, punch holes in the side, and then put the papers in your binder and they will be ready to place on the ambo.',
            'content' => '',
            'is_active' => 1,
            'font_awesome' => 'book',
            'custom_logo' => null,
            'url' => 'readings',
            'public_url' => 'https://readings.catholicresource.org',
        ]);

    }
}
