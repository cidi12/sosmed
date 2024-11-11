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
            $table->string('email');
            $table->string('username');
            $table->string('post_title');
            $table->string('post_content');
            $table->json('comment')->nullable();
            $table->string('like')->default('0');
            $table->string('dislike')->default('0');
            $table->string('share')->default('0');
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
