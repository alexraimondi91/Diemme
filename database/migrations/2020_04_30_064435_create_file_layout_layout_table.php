<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileLayoutLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_layout_layout', function (Blueprint $table) {
            $table->integer('file_layout_id')->unsigned();
            
            $table->integer('layout_id')->unsigned();
            $table->index('file_layout_id','layout_id')->unique();
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
        Schema::dropIfExists('file_layout_layout');
    }
}
