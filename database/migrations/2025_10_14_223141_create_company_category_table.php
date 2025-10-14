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
        Schema::create('company_category', function (Blueprint $table) {
            $table->primary(['company_id', 'company_category_id']);
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('company_category_id')->constrained('company_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_category');
    }
};
