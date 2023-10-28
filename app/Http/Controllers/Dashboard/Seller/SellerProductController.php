<?php

namespace App\Http\Controllers\Dashboard\Seller;

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
use Illuminate\Support\Facades\Auth;
use Redirect;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(GetAllProductsAction $getAllProductsAction)
    {
        $products = $getAllProductsAction->execute(array_merge(['store_id' => auth()->user()->store->id], request(['status', 'name'])));

        return view('dashboard.seller.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.seller.product.create', compact(['categories']));
    }

    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $this->authorize('create', Store::find($request->store_id));
        $createProductAction->execute(ProductData::from($request->validated()));

        return Redirect::route('dashboard.seller.products.index')->with('success', 'Product Created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('dashboard.seller.product.edit', compact(['product', 'categories', 'stores']));
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

        return Redirect::route('seller.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('seller.products.index')->with('success', 'Product deleted successfully.');
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

        return view('dashboard.seller.product.trash', compact('products'));
    }

    public function forceDelete(string $slug, DeleteProductAction $deleteProductAction)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->firstOrFail();

        $deleteProductAction->execute($product);

        return redirect()->back()->with('success', 'Product deleted forever');
    }
}
