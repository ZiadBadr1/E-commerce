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
        $products = $getAllProductsAction->execute(request(['status', 'name']));
        $products->load('store');

        return view('dashboard.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('dashboard.admin.product.create', compact('categories', 'stores'));
    }

    //
    //      Store a newly created resource in storage.
    //

    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $createProductAction->execute(ProductData::from($request->validated()));

        return redirect(route('admin.products.index'))->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('dashboard.admin.product.edit', compact(['product', 'categories', 'stores']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction)
    {
        $updateProductAction->execute(
            $product->load('images'),
            ProductData::from(
                array_merge(
                    $product->attributesToArray(),
                    $request->validated()
                )
            )
        );

        return Redirect::route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function restore($slug)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $product->restore();

        return redirect()->back()->with('success', 'Product restored successfully.');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->with(['category', 'images', 'store'])->filter(request(['status']))->latest()->get();

        return view('dashboard.admin.product.trash', compact('products'));
    }

    public function forceDelete(string $slug, DeleteProductAction $deleteProductAction)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->firstOrFail();

        $deleteProductAction->execute($product);

        return redirect()->back()->with('success', 'Product deleted forever');
    }
}
