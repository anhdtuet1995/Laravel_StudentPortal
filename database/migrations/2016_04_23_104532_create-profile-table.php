<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('value');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('hobbies', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('studies', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('publication_date');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
        Schema::drop('hobbies');
        Schema::drop('studies');
        
    }
}
