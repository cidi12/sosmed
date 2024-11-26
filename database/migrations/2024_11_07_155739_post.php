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
            $table->string('user_id');
            $table->string('email');
            $table->string('username');
            $table->string('post_title');
            $table->text('post_content');
            $table->string('post_commenter')->nullable()->default('');
            $table->text('post_comment')->nullable()->default('');
            $table->bigInteger('total_comment')->default('0');
            // $table->json('comment')->nullable();
            $table->bigInteger('likes')->default('0');
            $table->bigInteger('dislikes')->default('0');
            $table->bigInteger('shares')->default('0');
            $table->bigInteger('merit')->default('0');
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
