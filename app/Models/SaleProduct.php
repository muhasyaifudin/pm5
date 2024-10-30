<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sale_id',
        'product_id',
        'price',
        'quantity',
        'total'
    ];

    protected $table = 'sale_product';

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }   

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
