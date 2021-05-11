<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descriptions');
            $table->bigInteger('categoryproject_id');
            $table->dateTime('started_at');
            $table->dateTime('finished_at')->nullable();
            $table->string('missions');
            $table->string('languages');
            $table->string('software');
            $table->string('links');
            $table->string('github_links');
            $table->boolean('online');
            $table->string('pictures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
