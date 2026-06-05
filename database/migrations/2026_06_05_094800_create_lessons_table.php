<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Relasi ke tabel courses
            $table->string('title'); // Judul bab (Misal: "Pengenalan Tag HTML")
            $table->string('slug');
            $table->text('content'); // Isi materi lengkap (bisa diisi teks Markdown atau HTML)
            $table->string('video_url')->nullable(); // Link video YouTube jika ada
            $table->integer('order_number'); // Urutan bab (1, 2, 3...)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};