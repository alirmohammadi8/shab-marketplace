<?php

namespace Shab\Marketplace\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Shab\Marketplace\Http\Requests\CreateProductRequest;
use Shab\Marketplace\Http\Requests\DeleteProductRequest;
use Shab\Marketplace\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::withName($request->input('name'))
            ->withMaxPrice($request->input('max_price'))
            ->sortedByPrice($request->input('sort_by_price'))
            ->get();
        return response()->json($products);
    }

    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        if($request->hasFile('files')) {
            foreach($request->file('files') as $file) {
                $product->addMedia($file)->toMediaCollection('products');
            }
        }

        return response()->json($product, ResponseAlias::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        if($request->hasFile('files')) {
             $product->clearMediaCollection('products');

            foreach($request->file('files') as $file) {
                $product->addMedia($file)->toMediaCollection('products');
            }
        }

        return response()->json($product, ResponseAlias::HTTP_OK);
    }

    public function destroy(DeleteProductRequest $request,Product $product)
    {
        $product->clearMediaCollection('products');

        $product->delete();

        return response()->json($product, ResponseAlias::HTTP_OK);
    }
}
