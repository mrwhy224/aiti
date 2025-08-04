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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique()->index(); // Unique and indexed for fast lookups
            $table->text('excerpt')->nullable(); // A short summary of the post
            $table->longText('body'); // For the main, potentially long, content

            // Media and publishing status
            $table->string('featured_image_path')->nullable(); // Path to a main image
            $table->boolean('is_published')->default(false)->index();
            $table->timestamp('published_at')->nullable(); // To schedule posts

            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For recoverable deletion (adds a 'deleted_at' column)
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
