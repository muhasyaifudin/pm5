<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleRequest;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index()
    {
        $customers = collect([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '000000000000',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '000000000000',
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@example.com',
                'phone' => '000000000000',
            ],
        ]);

        return response()->json([
            'customers' => $customers,
        ]);
    }

    public function store(SampleRequest $request)
    {
        $data = $request->all();

        return response()->json([
            'data' => $data,
        ]);
    }
}
