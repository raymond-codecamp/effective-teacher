<?php

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
        //$this->call(sprint1_phase1_seeder::class);
        //$this->call(districts::class); 
        //$this->call(LevelSeeder::class);
        $this->call(ProgramTypeSeeder::class);
    }
}
