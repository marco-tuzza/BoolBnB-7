<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartamentiHasServiziAppartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamenti_has_servizi_appartamento', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('id_appartamento');
            $table->mediumInteger('id_servizio_appartamento');
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
        Schema::dropIfExists('appartamenti_has_servizi_appartamento');
    }
}
