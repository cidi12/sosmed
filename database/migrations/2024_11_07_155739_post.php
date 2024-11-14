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
            $table->string('post_comment')->nullable()->default('');
            $table->bigInteger('total_comment')->default('0');
            // $table->json('comment')->nullable();
            $table->bigInteger('like')->default('0');
            $table->bigInteger('dislike')->default('0');
            $table->bigInteger('share')->default('0');
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
