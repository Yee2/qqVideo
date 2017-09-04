<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_albums', function (Blueprint $table) {
            $table->engine = "innoDB";
            $table->increments('id');
            $table->string('title')->nullable()->index()->comment("标题");
            $table->string('sub_title')->nullable()->comment("副标题");
            $table->integer('type_id')->default(1)->index()->comment("类型ID");
            $table->string('parse_type')->nullable()->comment("类型ID");
            $table->string('source_url')->nullable()->index()->comment("资源地址");
            $table->longText('tags')->nullable()->comment("标签");
            $table->longText('year')->nullable()->comment("年份");
            $table->longText('director')->nullable()->comment("导演");
            $table->longText('actors')->nullable()->comment("导演");
            $table->longText('aera')->nullable()->comment("地区");
            $table->longText('language')->nullable()->comment("语言");
            $table->longText('descript')->nullable()->comment("描述");
            $table->string('remark')->nullable()->comment("备注");
            $table->integer('sort')->default(0)->comment("排序");
            $table->integer('status')->default(1)->comment("状态：1更新中2全集");
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
        Schema::dropIfExists('sp_albums');
    }
}
