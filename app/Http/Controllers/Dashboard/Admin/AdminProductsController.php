<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Actions\ImageActions\DeleteImageAction;
use App\Actions\ProductActions\CreateProductAction;
use App\Actions\ProductActions\DeleteProductAction;
use App\Actions\ProductActions\GetAllProductsAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Redirect;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllProductsAction $getAllProductsAction)
    {
        $products = $getAllProductsAction->execute(request(['status']));
        $products->load('store');

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('dashboard.product.create', compact('categories', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $createProductAction->execute(ProductData::from($request->validated()));

        return redirect(route('products.index'))->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('dashboard.product.edit', compact(['product', 'categories', 'stores']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction)
    {
        $updateProductAction->execute($product->load('images'), ProductData::from(
            array_merge(
                $product->attributesToArray(),
                $request->validated()
            )
        ));

        return Redirect::route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, DeleteProductAction $deleteProductAction)
    {
        $deleteProductAction->execute($product->load('images'));

        return Redirect::route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.index');

    }
    public function trash()
    {
        $products = Product::onlyTrashed()->with(['category', 'images'])->filter(request(['status']))->latest()->get();
        $products->load('store');
        return view('dashboard.product.trash', compact('products'));

    }
    public function forceDelete(string $id, DeleteImageAction $deleteImageAction)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $image = $product->image ;
        if($image)
        {
            $deleteImageAction->execute($image);
        }
        $product->forceDelete();
        return redirect()->route('products.index')->with('success', 'product deleted forever');
    }

}
