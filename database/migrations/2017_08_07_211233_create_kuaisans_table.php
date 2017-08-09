<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuaisans', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type")->comment("类型");
            $table->string("numbers")->comment("期号");
            $table->enum('is_big', ['yes', 'no'])->default('no');
            $table->enum('is_small', ['yes', 'no'])->default('no');
            $table->enum('is_odd', ['yes', 'no'])->default('no');
            $table->enum('is_even', ['yes', 'no'])->default('no');
            $table->integer('big_num')->default(1);
            $table->integer('small_num')->default(1);
            $table->integer('odd_num')->default(1);
            $table->integer('even_num')->default(1);
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
        Schema::dropIfExists('kuaisans');
    }
}
