<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsShowcase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_showcase', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_file',100);
            $table->string('name',100);
            $table->string('path',100);
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_showcase');
    }
}
