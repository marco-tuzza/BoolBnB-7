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
        Schema::create('appartamenti_servizi', function (Blueprint $table) {

            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('appartamenti');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('servizi_appartamento');

            $table->primary(['apartment_id', 'service_id']);
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
        Schema::dropIfExists('appartamenti_servizi');
    }
}
