<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyParsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_parses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('bank')->nullable();
            $table->string('birthday')->nullable();
            $table->text('business_content')->nullable();
            $table->string('ceo')->nullable();
            $table->string('company_size')->nullable();
            $table->string('corporate_position')->nullable();
            $table->string('corporate_type')->nullable();
            $table->string('empire_code')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('eng_name')->nullable();
            $table->string('fax')->nullable();
            $table->string('industry')->nullable();
            $table->string('market_code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('share_type')->nullable();
            $table->string('tax_period')->nullable();
            $table->string('tse_code')->nullable();
            $table->string('url')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_parses');
    }
}
