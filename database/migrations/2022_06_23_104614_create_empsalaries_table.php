<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpsalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empsalaries', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->integer('school_id');
            $table->string('name');
            $table->integer('emps');
            $table->integer('main7');
            $table->integer('adds');
            $table->integer('add19');
            $table->integer('add10');
            $table->integer('addd10');
            $table->integer('master');
            $table->integer('addadd');
            $table->integer('addsoc');
            $table->integer('add25%');
            $table->integer('add25');
            $table->integer('add50');
            $table->integer('add91');
            $table->integer('addinstead');
            $table->integer('aw');
            $table->integer('addwork');
            $table->integer('teachinn');
            $table->integer('teacherin');
            $table->integer('in');
            $table->integer('menha');
            $table->integer('addsal');
            $table->integer('allud');
            $table->integer('e3ara');
            $table->integer('lastperiod');
            $table->integer('workerbox');
            $table->integer('niqaba2');
            $table->integer('niqaba');
            $table->integer('group');
            $table->integer('club');
            $table->integer('join');
            $table->integer('deadbox');
            $table->integer('integrated');
            $table->integer('dmgha');
            $table->integer('draap');
            $table->integer('redraap');
            $table->integer('niqapat');
            $table->integer('allcut');
            $table->integer('udeserve');
   
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empsalaries');
    }
}
