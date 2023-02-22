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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', '255');
            $table->text('content');
            $table->integer('year');
            $table->integer('price');
            $table->string('img_path')->nullable()->default(null);
            $table->integer('view_count')->default(0);
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
