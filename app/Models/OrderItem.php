<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'ticket_id',
        'quantity',
        'price'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
    ];
    
    // Relasi: Order item milik satu order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    // Relasi: Order item milik satu tiket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    
    // Accessor untuk subtotal
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }
    
    // Accessor untuk format subtotal
    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }
}