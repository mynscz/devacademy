<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Banyak Materi (Lesson) dimiliki oleh satu Kelas (Course)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

// Relasi untuk mengecek mahasiswa mana saja yang sudah menyelesaikan materi ini
public function usersCompleted()
{
    return $this->belongsToMany(User::class, 'lesson_user')->withTimestamps();
}
    }