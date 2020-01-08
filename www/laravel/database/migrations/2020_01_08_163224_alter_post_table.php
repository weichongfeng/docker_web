<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->string('title')->after('id')->nulleble(false)->default('')->comment('文章标题')->change();
            $table->string('desc', 1000)->after('title')->nulleble(false)->default('')->comment('文章描述');
            $table->unsignedTinyInteger('status')->after('title')->nulleble(false)->default(1)->comment('文章状态1正常0删除2草稿');
            $table->unsignedMediumInteger('category_id')->after('status')->nulleble(false)->default(0)->comment('文章分类id');
            $table->unsignedMediumInteger('pv')->after('category_id')->nulleble(false)->default(0)->comment('pv');
            $table->unsignedMediumInteger('uv')->after('pv')->nulleble(false)->default(0)->comment('uv');
            $table->text('content')->after('desc')->comment('文章内容');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
