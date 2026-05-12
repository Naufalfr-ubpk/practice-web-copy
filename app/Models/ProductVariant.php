<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'name', 'sku', 'price_adjustment', 'stock', 'is_active'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}