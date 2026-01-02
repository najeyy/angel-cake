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
        'image',
        'is_featured',
        'sort_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('created_at', 'desc');
    }

    public function scopeActive($query)
    {
        return $query->orderBy('sort_order', 'asc')
                    ->orderBy('created_at', 'desc');
    }
}