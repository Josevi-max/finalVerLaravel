<?php

namespace Database\Seeders;

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
        
        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);
        User::factory(69)->create();



       
        // \App\Models\User::factory(10)->create();
    }
}
