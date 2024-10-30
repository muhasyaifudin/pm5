<?php

declare(strict_types=1);

namespace App\Repositories;

class CollectionRepository
{
    public function __construct()
    {

    }

    public function getAll(): array
    {
        // Create a Laravel Collection from an array
        $numbers = collect([1, 2, 3, 4, 5]);

        // Example: Square each number in the collection
        $squaredNumbers = $numbers->map(function ($number) {
            return $number * $number;
        });

        // Example: Filter numbers greater than 10
        $filtered = $squaredNumbers->filter(function ($number) {
            return $number > 10;
        });

        $accumulated = $squaredNumbers->reduce(function ($carry, $number) {
            return $carry + $number;
        }, 0);

         return [
            'squaredNumbers' => $squaredNumbers->all(), // Output: [1, 4, 9, 16, 25]
            'filtered' => $filtered->values()->all(),  // Output: [16, 25]
            'accumulated' => $accumulated,  // Output: 54
         ];
    }
}