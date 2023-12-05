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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userone');
            $table->unsignedBigInteger('usertwo');
            $table->text('messages_json');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('userone')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usertwo')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
