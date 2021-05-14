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
        // $this->call(UserSeeder::class);
        $this->call(DeporteSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
