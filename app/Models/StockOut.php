<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOut extends Model
{
    protected $table = 'stock_outs';

    protected $fillable = [
        'product_id',
        'quantity',
        'reason',
        'notes',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    /**
     * Get the product associated with this stock out.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
