<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(3)->create();
        //  \App\Models\Blog::factory(15)->create();
        //  \App\Models\Project::factory(50)->create();
        //  \App\Models\Testimonial::factory(15)->create();
         \App\Models\BusinessSetting::factory(1)->create();
    }
}
