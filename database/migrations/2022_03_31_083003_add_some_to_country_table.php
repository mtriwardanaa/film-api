<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeToCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('iso')->after('id');
            $table->string('nicename')->after('name');
            $table->string('iso3')->after('nicename');
            $table->string('numcode')->after('iso3');
            $table->string('phonecode')->after('numcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('iso');
            $table->dropColumn('nicename');
            $table->dropColumn('iso3');
            $table->dropColumn('numcode');
            $table->dropColumn('phonecode');
        });
    }
}
