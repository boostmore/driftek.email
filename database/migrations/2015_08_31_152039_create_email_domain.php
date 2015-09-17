<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailDomain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create email_domains table
        Schema::create('email_domains', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email_domain')->index()->unique();
            $table->string('tld')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop email_domains table
        Schema::drop('email_domains');
    }
}
