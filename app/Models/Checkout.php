<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'grandTotal',
        'payment_receipt',
        'created_by',
        'updated_by'
    ];

    public function pivotCheckouts()
    {
        return $this->hasMany(PivotCheckout::class, 'checkout_id');
    }

    // Relasi ke user yang membuat checkout
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
