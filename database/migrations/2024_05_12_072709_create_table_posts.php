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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('image', 200)->nullable();
            $table->string('albums', 300)->nullable();
            $table->string('description', 300)->nullable();
            $table->longText('content')->nullable();
            $table->string('cre', 100)->nullable();
            $table->integer('position')->default(0);
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('post_catalogue_id')->unsigned()->nullable();
            $table->foreign('post_catalogue_id')->references('id')->on('post_catalogues')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('publish')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
