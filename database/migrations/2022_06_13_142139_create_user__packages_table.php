<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('package_id');
            $table->float('package_value');
            $table->float('package_double_value');
            $table->float('package_revenue');
            $table->string('currency_type');
            $table->string('network');
            $table->string('deposite_ss');
            $table->string('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__packages');
    }
}
