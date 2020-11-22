<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhotoNoticesTableMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('photos_notices', function (Blueprint $table) {
            $table->id();
            $table->string('file', 128)->nullable();
            $table->unsignedBigInteger('notice_id');

            $table->foreign('notice_id')->references('id')->on('noticias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
