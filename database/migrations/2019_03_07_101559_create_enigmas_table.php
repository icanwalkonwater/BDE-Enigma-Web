<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnigmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enigmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->unsigned()->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('difficulty');

            $table->foreign('owner_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enigmas');
    }
}
