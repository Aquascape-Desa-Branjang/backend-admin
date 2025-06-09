<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::orderBy('order')->get();

        return view('product_categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('product_categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:product_categories,slug'],
        ]);

        ProductCategory::create($validated);

        return redirect()->route('product-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(ProductCategory $productCategory): View
    {
        return view('product_categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory): View
    {
        return view('product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:product_categories,slug,'.$productCategory->id],
        ]);

        $productCategory->update($validated);

        return redirect()->route('product-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(ProductCategory $productCategory): RedirectResponse
    {
        $productCategory->delete();

        return redirect()->route('product-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
