<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdviceRecipientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_recipients', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('advice_id');
			$table->integer('user_id');
			$table->timestamps();

			$table->unique(array('advice_id', 'user_id'));
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advice_recipients');
    }

}
