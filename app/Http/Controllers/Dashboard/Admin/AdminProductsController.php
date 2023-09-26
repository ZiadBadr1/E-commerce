<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Actions\ProductActions\CreateProductAction;
use App\Actions\ProductActions\DeleteProductAction;
use App\Actions\ProductActions\GetAllProductsAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Redirect;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllProductsAction $getAllProductsAction)
    {
        $products = $getAllProductsAction->execute();

        // todo return products to the view with success message
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // todo return the view of creating product with categories
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $createProductAction->execute(ProductData::from($request->validated()));

        // todo redirect to index view
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // todo return to show view with product data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // todo reutrn to the view of editing the product with product data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction)
    {
        $updateProductAction->execute($product, ProductData::from($request->validated()));

        return Redirect::route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, DeleteProductAction $deleteProductAction)
    {
        $deleteProductAction->execute($product);

        return Redirect::route('products.index')->with('success', 'Product deleted successfully.');
    }
}
