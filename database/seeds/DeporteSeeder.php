<?php

use Illuminate\Database\Seeder;

class DeporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\Deporte::create([
            'name'=>'Ajedrez',
            'file' => 'Ajedrez.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Atletismo',
            'file' => 'Atletismo.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Baloncesto',
            'file' => 'Baloncesto.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Ciclismo',
            'file' => 'Ciclismo.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Discapacidad',
            'file' => 'Discapacidad.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Fútbol',
            'file' => 'Futbol.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Fútbol De Salón',
            'file' => 'FutbolDeSalon.png',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Gimnasia',
            'file' => 'Gimnasia.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Lucha',
            'file' => 'Lucha.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Natación',
            'file' => 'Natacion.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Patinaje',
            'file' => 'Patinaje.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Taekwondo',
            'file' => 'Taekwondo.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Tenis De Campo',
            'file' => 'TenisDeCampo.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Tenis De Mesa',
            'file' => 'TenisDeMesa.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
        App\Deporte::create([
            'name'=>'Voleibol',
            'file' => 'Voleibol.jpg',
            'in_charge'=>'Juan Pablo',
            'profile'=>'Ingeniero'
        ]);
    }
}