<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kdrs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bdl_m1')->default(0);
            $table->string('bdl_e2')->default(0);
            $table->string('hafez_ada')->default(0);
            $table->string('hafez25')->default(0);
            $table->string('all')->default(0);
            $table->string('main2014')->default(0);
            $table->string('all_main2014')->default(0);


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
        Schema::dropIfExists('kaders');
    }
}
