<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeporteHorario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deporte_horario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deporte_id');
            $table->unsignedBigInteger('horario_id');

            $table->foreign('deporte_id')->references('id')->on('deportes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('horario_id')->references('id')->on('horarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('deporte_horario');
    }
}
