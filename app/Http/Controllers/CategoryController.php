<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository; // Import Class
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository; // Instance repository

    public function __construct()
    {
        $this->repository = new CategoryRepository(); // Definisi Repository
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->repository->getData();

        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $category = $this->repository->storeData($data);

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $category = $this->repository->updateData($id, $data);

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->repository->deleteData($id);

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }
}
