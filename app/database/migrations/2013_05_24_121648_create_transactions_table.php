<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('link_id');
			$table->integer('user_id');
			$table->integer('foreign_id');
			$table->float('commission');
			$table->timestamps();

			$table->unique(array('link_id', 'user_id', 'foreign_id'));
			$table->index('commission');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }

}
