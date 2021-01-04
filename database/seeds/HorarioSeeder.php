<?php

use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Horario::create([
            'day'=>'Lunes',
            'start' => '7:00',
            'finish'=>'12:00',
        ]);
        App\Horario::create([
            'day'=>'Miercoles',
            'start' => '9:00',
            'finish'=>'11:00',
        ]);
        App\Horario::create([
            'day'=>'Sabado',
            'start' => '13:00',
            'finish'=>'15:00',
        ]);
    }
}
