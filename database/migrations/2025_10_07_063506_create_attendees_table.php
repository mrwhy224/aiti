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
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            $table->morphs('attendable');
            $table->enum('status', ['invited', 'accepted', 'declined', 'attended', 'absent'])->default('invited');
            $table->timestamps();
            $table->unique(['meeting_id', 'attendable_id', 'attendable_type'], 'meeting_attendable_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
    }
};
