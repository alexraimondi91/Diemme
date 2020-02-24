<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationShowcase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_showcase', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name',20);
            $table->text('description');
            $table->integer('user_id')->unsigned();;
            $table->foreign('user_id')->on('users')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');;
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
        Schema::dropIfExists('quotation_showcase');
    }
}
