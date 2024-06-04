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
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke tabel checkouts
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
