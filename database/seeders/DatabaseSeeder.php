<?php

namespace Database\Seeders;

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
        $this->call([BookablesTableSeeder::class]);
        $this->call([BookingsTableSeeder::class]);
        // User::factory(10)->create();
    }
}
