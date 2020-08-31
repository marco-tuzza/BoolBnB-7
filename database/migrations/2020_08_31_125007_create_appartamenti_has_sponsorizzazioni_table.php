<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartamentiHasSponsorizzazioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamenti_has_sponsorizzazioni', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('id_appartamento');
            $table->mediumInteger('id_sponsorizzazione');
            $table->date('data_inizio_sponsorizzazione');
            $table->date('data_fine_sponsorizzazione');
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
        Schema::dropIfExists('appartamenti_has_sponsorizzazioni');
    }
}
