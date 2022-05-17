<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas', function (Blueprint $table) {

            $table->increments('id_semana');
            $table->unsignedInteger('id_nivel');
            $table->longText('contenido');    
            $table->integer('semana');  
            $table->string('codigo_video');         
            $table->timestamps();
            $table->foreign('id_nivel')
                   ->references('id_nivel')
                   ->on('niveles')
                   ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semanas');
    }
};
