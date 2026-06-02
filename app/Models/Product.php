<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_price',
        'category',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
    ];

    /**
     * Get all stock ins for this product.
     */
    public function stockIns(): HasMany
    {
        return $this->hasMany(StockIn::class);
    }

    /**
     * Get all stock outs for this product.
     */
    public function stockOuts(): HasMany
    {
        return $this->hasMany(StockOut::class);
    }
}
