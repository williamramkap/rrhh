<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipPositionGroupsEmployerNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('position_groups', function (Blueprint $table) {
            $table->integer('employer_number_id')->unsigned();
            $table->foreign('employer_number_id')->references('id')->on('employer_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('position_groups', function (Blueprint $table) {
            $table->dropForeign(['employer_number_id']);
            $table->dropColumn(['employer_number_id']);
        });
    }
}
