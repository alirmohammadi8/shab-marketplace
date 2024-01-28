<?php

namespace Shab\Marketplace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public function scopeWithName($query, $name)
    {
        if($name) {
            return $query->where('name', 'like', "%{$name}%");
        }
        return $query;
    }

    public function scopeWithMaxPrice($query, $max_price)
    {
        if($max_price) {
            return $query->where('price', '<=', $max_price);
        }
        return $query;
    }

    public function scopeSortedByPrice($query, $direction)
    {
        if($direction) {
            return $query->orderBy('price', $direction);
        }
        return $query;
    }

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'shipping_price',
    ];
}
