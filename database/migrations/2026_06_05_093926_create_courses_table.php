<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('icon'); // Untuk menyimpan emoji atau nama icon (misal: 🚀, 🎨)
            $table->integer('progress_default')->default(0); // Progress awal belajar
            $table->string('accent_color'); // Untuk warna border/tema unik tiap kartu kelas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};