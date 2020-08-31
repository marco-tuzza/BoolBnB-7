<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiche', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('id_appartamento');
            $table->date('data_visualizzazione');
            $table->mediumInteger('id_utente_visualizzazione')->nullable();
            $table->text('indirizzo_ip');
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
        Schema::dropIfExists('statistiche');
    }
}
