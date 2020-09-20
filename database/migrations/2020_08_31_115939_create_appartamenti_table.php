<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartamentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamenti', function (Blueprint $table) {
            $table->id();
            $table->text('titolo_appartamento');
            $table->tinyInteger('numero_stanze');
            $table->tinyInteger('numero_letti');
            $table->tinyInteger('numero_bagni');
            $table->mediumInteger('metri_quadri');
            $table->text('latitudine');
            $table->text('longitudine');
            $table->tinyInteger('visibile')->default('1');
            $table->text('immagine_appartamento');
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
        Schema::dropIfExists('appartamenti');
    }
}
