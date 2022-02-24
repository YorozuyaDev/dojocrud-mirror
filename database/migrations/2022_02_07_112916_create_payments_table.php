<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table-> decimal('amount', $scale=2);
            $table-> bigInteger('id_course')->unsigned()->nullable();
            $table-> bigInteger('id_user')->unsigned()->nullable();
               
            $table->foreign('id_course')->references('id')->on('courses');
            $table->foreign('id_user')->references('id')->on('users');

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
