<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\User;
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
        Culture::factory(30)->create();
        Fertilizer::factory(100)->create();
        Client::factory(50)->create();
        User::factory(20)->create();
    }
}
