<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name',50)->nullable(false)->default('')->comment('分类名称');
            $table->unsignedTinyInteger('status')->nullable(false)->default(1)->comment('分类状态0删除1正常');
            $table->unsignedTinyInteger('is_nav')->nullable(false)->default(0)->comment('是否为导航0不是1是常');
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
        Schema::dropIfExists('categories');
    }
}
