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
        $this->call(RoleSeeder::class);
         \App\Models\User::factory(10)->create();
         $this->call(AdminSeeder::class);
         \App\Models\Category::factory(7)->create();
         \App\Models\Editorial::factory(10)->create();
         \App\Models\Book::factory(20)->create();
         \App\Models\Writer::factory(20)->create();


    }
}
