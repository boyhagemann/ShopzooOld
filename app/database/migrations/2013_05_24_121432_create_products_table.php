<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('foreign_id');
            $table->integer('campaign_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('image');
            $table->string('url');
            $table->float('price');
            $table->timestamps();

            $table->index('price');
            $table->unique('url');
            $table->unique(array('campaign_id', 'foreign_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}
