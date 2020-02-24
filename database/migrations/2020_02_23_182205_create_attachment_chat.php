<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_chat', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('path',100);
            $table->string('name',100);
            $table->integer('chat_id')->unsigned();
            $table->foreign('chat_id')->on('chat')->references('id')
            ->onDelete('cascade');
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
        Schema::dropIfExists('attachment_chat');
    }
}
