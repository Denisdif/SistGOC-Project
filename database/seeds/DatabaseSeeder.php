<?php

use App\Models\Personal;
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
         $this->call(CreateDefaultUsersSeeder::class);
         //factory(Personal::class, 10)->create();

    }
}
