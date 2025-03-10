<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tag',
        'description',
        'category',
        'stocks',
        'price',
        'image',
        'created_by',
        'updated_by'
    ]; 

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pivotCheckouts()
    {
        return $this->hasMany(PivotCheckout::class);
    }
}
