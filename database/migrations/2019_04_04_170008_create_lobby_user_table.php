<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLobbyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobby_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
    
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('quiz_id')->unsigned();
    
            $table->foreign('quiz_id')->references('id')->on('quizzes');
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
        Schema::dropIfExists('lobby_user');
    }
}
