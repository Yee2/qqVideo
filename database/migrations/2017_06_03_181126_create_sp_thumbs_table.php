<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpThumbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_thumbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('albums_id')->nullable()->comment("专辑ID");
            $table->string('thumb')->nullable()->comment("缩略图");
            $table->enum('type', ['local', 'disk','site'])->default('local')
                ->comment("类型：本地、网盘");
            $table->string("remark")->nullable()->comment("备注");
            $table->softDeletes();
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
        Schema::dropIfExists('sp_thumbs');
    }
}
