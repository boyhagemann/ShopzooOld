<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->enum('gender', array('m' => 'v'))->after('last_name');
            $table->integer('parent_user_id')->after('gender');
            
            $table->index('parent_user_id');
            $table->index('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('parent_user_id');
        });
    }

}
