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
        // This table links posts and tags in a many-to-many relationship.
        // Laravel convention is to name it in singular, alphabetical order.
        Schema::create('post_tag', function (Blueprint $table) {

            // Foreign key for the Post model
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            // Foreign key for the Tag model
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');

            // Optional but recommended: Prevent duplicate tag attachments on the same post
            $table->unique(['post_id', 'tag_id']);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
