<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductReccomendationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reccomendation', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('reccomendation_id');
			$table->integer('product_id');
            $table->timestamps();

			$table->index('reccomendation_id');
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
        Schema::drop('product_reccomendation');
    }

}
