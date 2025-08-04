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
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();

            // Link to the user who made the request (nullable for guests)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // The polymorphic relationship to link to any model (e.g., Post, Product)
            // This creates `requestable_id` and `requestable_type` columns
            $table->morphs('requestable');

            $table->ipAddress('ip_address');
            $table->text('user_agent')->nullable();
            $table->string('url', 2048);
            $table->string('method', 10);
            $table->unsignedSmallInteger('status_code');
            $table->string('referrer', 2048)->nullable();

            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_logs');
    }
};
