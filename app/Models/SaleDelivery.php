<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleDelivery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sale_id',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'phone_number',
    ];

    protected $table = 'sale_deliveries';

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
