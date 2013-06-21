<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReccomendationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reccomendations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
			$table->text('body');
			$table->integer('user_id');
			$table->integer('friend_id');
			$table->integer('product_id');
			$table->string('status');
            $table->timestamps();

			$table->index('user_id');
			$table->index('friend_id');
			$table->index('product_id');
			$table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reccomendations');
    }

}
