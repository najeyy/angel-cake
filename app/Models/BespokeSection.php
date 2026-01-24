<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BespokeSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'image_label',
        'features',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer' // Tambahkan ini
    ];

    protected function features(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // Jika value adalah array (dari cast), langsung return
                if (is_array($value)) {
                    return $value;
                }
                
                // Decode JSON jika value adalah string
                $features = json_decode($value, true) ?? [];
                
                // Pastikan selalu ada 3 features
                $features = array_slice($features, 0, 3);
                
                // Isi feature yang kosong dengan default
                for ($i = 0; $i < 3; $i++) {
                    if (!isset($features[$i])) {
                        $features[$i] = ['value' => '', 'label' => ''];
                    } elseif (!is_array($features[$i])) {
                        $features[$i] = ['value' => '', 'label' => ''];
                    }
                }
                
                return $features;
            },
            set: function ($value) {
                // Pastikan value adalah array
                if (!is_array($value)) {
                    return json_encode([]);
                }
                
                // Pastikan hanya 3 features
                $value = array_slice($value, 0, 3);
                
                // Bersihkan setiap feature
                foreach ($value as &$feature) {
                    if (!is_array($feature)) {
                        $feature = ['value' => '', 'label' => ''];
                    }
                    $feature['value'] = $feature['value'] ?? '';
                    $feature['label'] = $feature['label'] ?? '';
                }
                
                return json_encode($value);
            }
        );
    }

    // Scope untuk yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    // Accessor untuk image URL
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        
        return asset('storage/' . $this->image);
    }
}