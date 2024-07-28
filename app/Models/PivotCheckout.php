<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotCheckout extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkout_id',
        'product_id',
        'quantity',
        'status',
        'created_by'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relasi ke tabel checkouts
    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'checkout_id');
    }
}
