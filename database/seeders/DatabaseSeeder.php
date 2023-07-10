<?php

namespace Database\Seeders;;

use Database\Seeders\ClientSeeder;
use Database\Seeders\UserstableSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ServiceSeeder;
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
        $this->call([
            UsersTableSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class
        ]);
    }
}