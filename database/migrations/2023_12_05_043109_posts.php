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
            $table->text('message');
            $table->text('images_json');
            $table->unsignedBigInteger('groupid')->nullable();
            $table->unsignedBigInteger('userid')->nullable();
            $table->unsignedBigInteger('fromuser')->nullable();
            $table->timestamp('date')->nullable()->default(now());

            // Foreign key constraints
            $table->foreign('groupid')->references('id')->on('groups')->onDelete('set null');
            $table->foreign('userid')->references('id')->on('users')->onDelete('set null');
            $table->foreign('fromuser')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
     public function down()
    {
        Schema::dropIfExists('posts');
    }
};
