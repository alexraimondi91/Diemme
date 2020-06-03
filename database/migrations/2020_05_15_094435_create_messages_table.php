<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->string("body")->nullable();
            $table->string("path")->nullable();
            $table->integer("id_user")->unsigned();
            $table->foreign('id_user')->on('users')->references('id')
            ->onUpdate('cascade');
            $table->integer("id_chat")->unsigned();
            $table->foreign('id_chat')->on('chats')->references('id')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('messages');
    }
}
