<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('step');
            $table->string('headline');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['step', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_cards');
    }
};
