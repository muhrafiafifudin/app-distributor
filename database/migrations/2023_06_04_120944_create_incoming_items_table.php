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
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('item_id');
            $table->integer('supplier_id');
            $table->integer('qty')->unsigned();
            $table->integer('stock')->unsigned();
            $table->integer('user_id');
            $table->integer('status')->default(1)->comment('0 = Out of Stock, 1 = In Stock');
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
        Schema::dropIfExists('incoming_items');
    }
};
