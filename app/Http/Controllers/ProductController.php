<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')
                          ->latest()
                          ->paginate(15);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $product = Product::create([
            ...$validated,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('products.index')
                         ->with('success', '✅ Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // Authorization check
        if ($product->user_id !== Auth::id()) {
            abort(403, 'You cannot edit this product.');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Authorization check
        if ($product->user_id !== Auth::id()) {
            abort(403, 'You cannot update this product.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
                         ->with('success', '✅ Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Authorization check
        if ($product->user_id !== Auth::id()) {
            abort(403, 'You cannot delete this product.');
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', '🗑️ Product deleted successfully!');
    }
}