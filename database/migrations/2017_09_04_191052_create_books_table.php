<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->date('depart_date');
            $table->time('depart_time');
            $table->date('return_date')->nullable();
            $table->time('return_time')->nullable();
            $table->string('dep_city');
            $table->string('des_city');
            $table->enum('class', ['Economy', 'Business', 'First class']);
            $table->integer('total_adults');
            $table->integer('total_children');
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
        Schema::dropIfExists('books');
    }
}
