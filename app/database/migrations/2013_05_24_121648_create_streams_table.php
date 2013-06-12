<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStreamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function(Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('action');
            $table->string('emotion');
            $table->integer('user_id');
            $table->integer('friend_id');
            $table->integer('product_id');
                    
            $table->timestamps();

            $table->index('action');
            $table->index('emotion');
            $table->index('user_id');
            $table->index('friend_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('streams');
    }

}
