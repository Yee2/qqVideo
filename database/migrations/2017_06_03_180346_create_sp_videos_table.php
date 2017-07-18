<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('albums_id')->nullable()->index()->comment("专辑ID");
            $table->string('title')->nullable()->comment("名称");
            $table->string('file_url')->nullable()->index()->comment("文件");
            $table->string('source_url')->nullable()->index()->comment("原视频链接");
            $table->string('remark')->nullable()->comment("备注");
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
        Schema::dropIfExists('sp_videos');
    }
}
