<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('image', 255);
            $table->text('short_desc');
            $table->longText('description');
            $table->string('color', 255)->nullable();
            $table->string('gift', 255)->nullable();
            $table->tinyInteger('hot')->default(0);
            $table->integer('price')->default(0);
            $table->integer('del')->default(0);
            $table->bigInteger('product_catalogue_id')->default(0)->unsigned();
            $table->foreign('product_catalogue_id')->references('id')->on('product_catalogues')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('brand_id')->default(0)->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->float('sold')->default(0);
            $table->integer('rate')->default(0);
            $table->integer('feedback')->default(0);
            $table->integer('accessory')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
