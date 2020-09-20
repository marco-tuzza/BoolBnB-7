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
        Schema::create('appart_sponsor', function (Blueprint $table) {

            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('appartamenti');

            $table->unsignedBigInteger('sponsor_type_id');
            $table->foreign('sponsor_type_id')->references('id')->on('sponsorizzazioni');

            $table->date('scadenza');

            $table->primary(['apartment_id', 'sponsor_type_id']);
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
        Schema::dropIfExists('appart_sponsor');
    }
}
