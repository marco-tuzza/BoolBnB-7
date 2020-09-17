<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAppartamentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appartamenti', function (Blueprint $table) {
            $table->unsignedBigInteger('id_proprietario')->after('id');
            $table->foreign('id_proprietario')->references('id')->on('users');
            $table->text('descrizione')->after('titolo_appartamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appartamenti', function (Blueprint $table) {
            //
        });
    }
}
