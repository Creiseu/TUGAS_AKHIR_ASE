<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'created_by', 'updated_by'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Product
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
