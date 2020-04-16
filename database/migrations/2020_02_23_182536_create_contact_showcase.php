<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactShowcase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_showcase', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name',20);
            $table->text('text');
            $table->string('email',40)->unique();
            $table->string('region',40);
            $table->string('nation',40);
            $table->string('number');
            $table->string('street');
            $table->string('lat');
            $table->string('long');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('contact_showcase');
    }
}
