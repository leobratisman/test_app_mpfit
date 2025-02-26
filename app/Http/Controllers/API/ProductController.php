<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\StoreRequest;
use App\Http\Requests\API\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        return ProductResource::make($product);
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $data = $request->validated();
        $product->update($data);
        $product->refresh();

        return ProductResource::make($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
