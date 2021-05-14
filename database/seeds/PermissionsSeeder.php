<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'name' => 'Permisos para noticias',
            'slug' => 'noticias.all',
            'description' => 'Permite todos los permisos necesarios para la sección de noticias'
        ]);
        Permission::create([
            'name' => 'Permisos para deportes',
            'slug' => 'deportes.all',
            'description' => 'Permite todos los permisos necesarios para la sección de deportes'
        ]);
    }
}
