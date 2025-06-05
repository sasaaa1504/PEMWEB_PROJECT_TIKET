<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

protected $fillable = [
    'user_id',
    'category_id',
    'name',
    'description',
    'event_date',
    'venue',
    'price',
    'image',
];

protected $casts = [
        'event_date' => 'datetime',
    ];

    // relasi ke kategori, kalau mau pakai nanti
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
