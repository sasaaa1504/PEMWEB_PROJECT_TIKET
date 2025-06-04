<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event_id',
        'name',
        'description',
        'price',
        'quantity',
        'sold',
        'is_active'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
    
    // Relasi: Tiket milik satu event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
    // Relasi: Tiket ada di banyak order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    // Scope untuk tiket aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    // Scope untuk tiket yang masih tersedia
    public function scopeAvailable($query)
    {
        return $query->whereRaw('quantity > sold');
    }
    
    // Accessor untuk format harga
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
    
    // Cek sisa tiket
    public function getRemainingTicketsAttribute()
    {
        return $this->quantity - $this->sold;
    }
}