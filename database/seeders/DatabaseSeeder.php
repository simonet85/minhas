<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SiteSettings;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\SiteSettingSeeder;
use Database\Seeders\HomeSectionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        // ]);

        // SiteSettings::factory()->create([
        //     'site_name' => 'My Site',
        //     'contact_mobile' => '1234567890',
        //     'contact_email' => 'info@mysite.com',
        //     'social_facebook' => 'https://www.facebook.com/mysite',
        //     'social_twitter' => 'https://www.twitter.com/mysite',
        //     'social_linkedin' => 'https://www.linkedin.com/mysite',
        //     'site_logo' => 'https://www.mysite.com/logo.png',
        // ]);

        $this->call([
            UserSeeder::class,
            MessageSeeder::class,
            HomeSectionsSeeder::class,
            // SiteSettingSeeder::class
            // add other seeders here if needed
        ]);
    }
}
