<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBinaryCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_binary_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('user_package_id');
            $table->float('current_left_balance');
            $table->float('current_right_balance');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_binary_commissions');
    }
}
