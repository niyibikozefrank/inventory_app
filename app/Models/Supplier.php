<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'address',
        'city',
        'country',
    ];

    /**
     * Get all stock ins from this supplier.
     */
    public function stockIns(): HasMany
    {
        return $this->hasMany(StockIn::class);
    }
}
