<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('postal')->nullable();
            $table->string('address')->nullable();
            $table->string('cd_id')->nullable();
            $table->string('representative')->nullable();
            $table->string('representative_last_name')->nullable();
            $table->string('representative_first_name')->nullable();
            $table->date('established')->nullable();
            $table->integer('listed_id')->nullable();
            $table->integer('employees')->nullable();
            $table->integer('capital')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
