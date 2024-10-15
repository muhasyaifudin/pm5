<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * specify the table name
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',  
    ];

    /**
     * Relations with Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Relations with SaleProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleProduct(): HasMany
    {
        return $this->hasMany(SaleProduct::class);
    }

    /**
     * Relations with Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sale(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
