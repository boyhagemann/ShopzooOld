<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSnippetsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function(Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('action');
            $table->string('emotion');
            $table->string('timeframe');
                    
            $table->timestamps();

            $table->index('action');
            $table->index('emotion');
            $table->index('timeframe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('snippets');
    }

}
