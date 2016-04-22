<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the jobs table
        Schema::create('jobs', function (Blueprint $table) {

        $table->increments('id');
        $table->string('title',150);
        $table->string('description',500);
        $table->string('salary',6);
        $table->string('location',100);
        $table->dateTime('startingdate');
        $table->dateTime('endingdate');
        $table->integer('user_id');
        $table->integer('approved');
        $table->timestamps();
        $table->softDeletes();


    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // when roll back it will delete all the stored jobs
        Schema::drop('jobs');
    }
}
