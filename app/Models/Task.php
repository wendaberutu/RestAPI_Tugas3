<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'completed'];

    // Jika ingin, aktifkan casting untuk kolom completed
    protected $casts = [
        'completed' => 'boolean',
    ];
}

