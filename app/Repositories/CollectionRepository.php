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
        $squaredNumbers = $numbers->map(function ($number){
            return $number * $number;
        });

        // Example: Filter numbers greater than 10
        $filteredNumbers = $squaredNumbers->filter(function ($number) {
            return $number > 10;
        });

        //Example: Accumulate Data
        $sum = $numbers->reduce(function ($carry, $number) {
            return $carry + $number;
        }, 0);

        // Loop 1 Carry = 0, Result = 1
        // Loop 2 Carry = 1, Result = 3
        // Loop 3 Carry = 3, Result = 6
        // Loop 4 Carry = 6, Result = 10
        // Loop 5 Carry = 10, Result = 15

        $names = collect(['Alice', 'Bob', 'Charlie', 'David', 'Eve']);

        $allNames = $names->reduce(function ($carry, $name) {
            return $carry . $name . ', ';
        }, '');

        // Loop 1 Carry = '', Result = 'Alice'
        // Loop 2 Carry = 'Alice', Result = 'Alice, Bob'
        // Loop 3 Carry = 'Alice, Bob', Result = 'Alice, Bob, Charlie'
        // Loop 4 Carry = 'Alice, Bob, Charlie', Result = 'Alice, Bob, Charlie, David'
        // Loop 5 Carry = 'Alice, Bob, Charlie, David', Result = 'Alice, Bob, Charlie, David, Eve'

        return [
            'squaredNumbers' => $squaredNumbers->all(),
            'filteredNumbers' => $filteredNumbers->all(),
            'reduceSum' => $sum,
            'sum' => $numbers->sum(),
            'names' => $allNames,
        ];
    }

    public function getReport(): array
    {
        // Sample data: Orders with items
        $orders = collect([
            [
                'id' => 1,
                'customer' => 'Alice',
                'items' => [
                    ['name' => 'Apple', 'quantity' => 3, 'price' => 100],
                    ['name' => 'Banana', 'quantity' => 2, 'price' => 50],
                ],
            ],
            [
                'id' => 2,
                'customer' => 'Bob',
                'items' => [
                    ['name' => 'Apple', 'quantity' => 1, 'price' => 100],
                    ['name' => 'Orange', 'quantity' => 4, 'price' => 75],
                ],
            ],
            [
                'id' => 3,
                'customer' => 'Alice',
                'items' => [
                    ['name' => 'Apple', 'quantity' => 2, 'price' => 100],
                    ['name' => 'Banana', 'quantity' => 1, 'price' => 50],
                ],
            ],
        ]);

        // 1. Group orders by customer
        $ordersByCustomer = $orders->groupBy('customer');

        // 2. Calculate total quantity and amount per customer
        $customerSummaries = $ordersByCustomer->map(function ($customerOrders, $customerName) {
            $totalQuantity = 0;
            $totalAmount = 0;

            foreach ($customerOrders as $order) {
                foreach ($order['items'] as $item) {
                    $totalQuantity += $item['quantity'];
                    $totalAmount += $item['quantity'] * $item['price'];
                }
            }

            return [
                'customer' => $customerName,
                'total_quantity' => $totalQuantity,
                'total_amount' => $totalAmount,
            ];
        });

        // 3. Sort summaries by total amount spent, descending
        $sortedSummaries = $customerSummaries->sortByDesc('total_amount');

        // 4. Generate summary report
        $report = $sortedSummaries->map(function ($summary) {
            return "Customer: {$summary['customer']} - Total Quantity: {$summary['total_quantity']} - Total Amount: \${$summary['total_amount']}";
        });

        return $report->all();
    }
}