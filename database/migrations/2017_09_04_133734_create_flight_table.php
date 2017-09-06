<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date');
            $table->time('flight_time');
            $table->time('arrival_time');
            $table->string('dep_city');
            $table->string('des_city');
            $table->unsignedInteger('airline_id');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('airline_id')
                ->references('id')
                ->on('airlines')
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
        Schema::dropIfExists('flights');
    }
}
