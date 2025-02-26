<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $targetCategory = Category::where('title', $data['category_id'])->first()->toArray();
        $data['category_id'] = $targetCategory['id'];

        Product::create($data);

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $data = $request->validated();
        $targetCategory = Category::where('title', $data['category_id'])->first()->toArray();
        $data['category_id'] = $targetCategory['id'];

        $product->update($data);
        $product->refresh();

        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
