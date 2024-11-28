<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository; // Import Class
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

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

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $category = $this->repository->storeData($data);

        return redirect()->route('category.index')->with('success', 'Data berhasil ditambahkan');
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
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();

        $category = $this->repository->updateData($id, $data);

        return redirect()->route('category.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->repository->deleteData($id);

        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
    }
}
