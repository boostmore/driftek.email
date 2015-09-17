<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Domains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('registrar_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('first');
            $table->string('last');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->integer('registrar_id')->unsigned();
            $table->timestamps();

            $table->unique(['username','registrar_id']);
            $table->foreign('registrar_id')->references('id')->on('registrars');

        });


        Schema::create('dns_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dns_template_rrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('data');
            $table->integer('aux')->unsigned();
            $table->integer('ttl')->unsigned();
            $table->enum('type',['A','AAAA','ALIAS','CNAME','HINFO','MX','NAPTR','NS','PTR','RP','SRV','TXT']);
            $table->integer('dns_template_id')->unsigned();

            $table->foreign('dns_template_id')->references('id')->on('dns_templates');

        });

        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('purchased_on');
            $table->date('expires_on');
            $table->integer('registrar_account_id')->unsigned();
            $table->integer('dns_template_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('registrar_account_id')->references('id')->on('registrar_accounts');
            $table->foreign('dns_template_id')->references('id')->on('dns_templates');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('domains');
        Schema::drop('registrar_accounts');
        Schema::drop('registrars');
        Schema::drop('dns_template_rrs');
        Schema::drop('dns_templates');
    }
}
