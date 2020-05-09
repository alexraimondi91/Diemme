<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LayoutUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_user', function (Blueprint $table) {
            
            $table->integer('layout_id')->unsigned()->index();
            $table->foreign('layout_id')->on('layout')->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->on('users')->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
