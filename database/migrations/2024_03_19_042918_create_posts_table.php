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
            $table->text('image');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->date('date');
            $table->integer('views');
            $table->enum('status', ['published', 'draft', 'archived']);
            $table->foreignId('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('post_categories')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')->onDelete('restrict');
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
