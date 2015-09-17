<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->index()->unique();
            $table->integer('email_domain_id')->index()->unsigned();
            $table->timestamps();

        });

        Schema::table('emails', function(Blueprint $table) {
            $table->foreign('email_domain_id')->references('id')->on('email_domains');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emails');
    }
}
