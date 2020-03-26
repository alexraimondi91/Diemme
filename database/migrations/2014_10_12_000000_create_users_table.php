<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_user',40);
            $table->string('surname_user',60);
            $table->string('email_user',40)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('fiscalCode_user',18);
            $table->string('address_user',60);
            $table->string('country_user',60);
            $table->timestamps();
            $table->boolean('active');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->on('group')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
