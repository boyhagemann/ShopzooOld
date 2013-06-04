<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advices', function(Blueprint $table) {
            $table->increments('id');
			$table->string('subject');
			$table->text('body');
			$table->integer('from');
			$table->string('status');
			$table->timestamps();

			$table->index('from');
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
        Schema::drop('advices');
    }

}
