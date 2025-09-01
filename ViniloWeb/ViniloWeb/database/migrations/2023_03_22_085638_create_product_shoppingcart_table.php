<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shoppingcart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shoppingcart_id')->default(1)->onDelete('cascade')->constrained();
            $table->foreignId('product_id')->default(1)->onDelete('cascade')->constrained();
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('product_shoppingcart');
    }
};
