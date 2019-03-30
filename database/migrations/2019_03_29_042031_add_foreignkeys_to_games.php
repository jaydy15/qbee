<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('games', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
    
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('quiz_id')->unsigned();
    
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
}
