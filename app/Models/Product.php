<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationship: Product belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope: Active products
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: In stock
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }
}