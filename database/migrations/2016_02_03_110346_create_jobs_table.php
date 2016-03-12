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
        $table->string('contact_name')->nullable();
        $table->string('contact_email')->nullable();
        $table->string('salary',3);
        $table->string('location',100);
        $table->timestamps('updated_at');
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
