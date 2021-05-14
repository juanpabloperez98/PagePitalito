<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clave = bcrypt('deathnote3');
        App\User::create([
            'name'=>'Juan Pablo',
            'last_name' => 'Perez Santos',
            'email'=>'juanpablo.perez@utp.edu.co',
            'password'=> $clave
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);

        $user = User::findOrFail(1);
        $user->assignRoles('admin');
    }
}
