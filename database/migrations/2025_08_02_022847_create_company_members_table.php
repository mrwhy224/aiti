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
        Schema::create('company_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->index();
            $table->string('name');
            $table->string('position', 256);
            $table->string('phone', 256)->nullable();
            $table->string('email', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_members');
    }
};
