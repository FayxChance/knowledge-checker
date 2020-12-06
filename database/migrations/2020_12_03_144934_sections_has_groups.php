<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectionsHasGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections_has_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('section')->index();
            $table->unsignedBigInteger('group')->index();

            $table->foreign('section')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections_has_groups');
    }
}
