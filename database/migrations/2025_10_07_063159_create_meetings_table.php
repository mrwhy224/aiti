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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان جلسه
            $table->text('description')->nullable(); // توضیحات جلسه
            $table->string('location'); // محل برگزاری
            $table->dateTime('start_time'); // زمان شروع
            $table->dateTime('end_time')->nullable(); // زمان پایان
            $table->boolean('notify');
            $table->enum('status', ['scheduled', 'ongoing', 'completed', 'canceled'])->default('scheduled'); // وضعیت جلسه
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
