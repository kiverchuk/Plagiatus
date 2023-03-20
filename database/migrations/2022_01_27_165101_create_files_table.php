<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string("sistemName");
            $table->string("fileName");
            $table->string("title");
            $table->string("author");
            $table->string("coordinator");
            $table->string("organizationunit");
            $table->integer('words');
            $table->integer('characters');
            $table->integer('strangeLetters');
            $table->string('excludePages')->nullable();
            $table->boolean('incheck')->default(0);
            $table->boolean('incheckg')->default(0);
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
        Schema::dropIfExists('files');
    }
}
