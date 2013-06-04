<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdviceLinkTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_link', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('advice_id');
			$table->integer('link_id');
			$table->timestamps();

			$table->unique(array('advice_id', 'link_id'));
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advice_link');
    }

}
