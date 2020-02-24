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
            $table->string('name',40);
            $table->string('surname',60);
            $table->string('email',40)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('fiscalCode',18);
            $table->string('address',40);
            $table->string('country',20);
            $table->timestamp('insertDate')->nullable();
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
