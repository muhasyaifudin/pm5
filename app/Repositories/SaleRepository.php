<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    public function createData(array $data): Sale
    {
        $sale = Sale::create($data);
        $sale->products()->attach($data['products']);
        $sale->saleDelivery()->create($data['delivery']);

        $sale->refresh();

        return $sale;
    }

    public function deleteData(Sale $sale): Sale
    {
        $sale->products()->detach();
        $sale->saleDelivery()->delete();
        $sale->delete();

        return $sale;
    }   
}