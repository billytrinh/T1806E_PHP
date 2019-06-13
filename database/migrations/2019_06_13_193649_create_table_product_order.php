<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->integer("qty");
            $table->timestamps();
        });
        Schema::table('product_order', function (Blueprint $table) {
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("order_id");
            $table->foreign("product_id")->references("product_id")
                ->on("product");
            $table->foreign("order_id")->references("order_id")
                ->on("order");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_order');
        Schema::table('product_order', function (Blueprint $table) {
            $table->dropForeign(["product_id"]);
            $table->dropForeign(["order_id"]);
        });
    }
}
