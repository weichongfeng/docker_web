<?php

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_sn')->unique()->nullable(false);
            $table->decimal('price', 8, 2)->default(0)->nullable(false);
            $table->string('address')->nullable(false);
            $table->char('phone',11)->nullable(false);
            $table->timestamps();
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
