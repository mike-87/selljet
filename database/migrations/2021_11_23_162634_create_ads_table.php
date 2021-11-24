<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('ads_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->enum('condition', ['1', '2'])->comment('1 - new; 2 - used');
            $table->string('image')->default('selljet.jpg');
            $table->string('phone');
            $table->string('location');
            $table->integer('category_id');
            $table->integer('owner');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
