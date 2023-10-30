@extends('dashboard.seller.layouts.master')
@section('title', 'Products')
@section('header-title', 'Products')


@section('content')
    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                    action="{{ route('dashboard.seller.products.update', ['product' => $product]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="name" type="text"
                                                placeholder="Product Name" value="{{ $product->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category_id">
                                                <option disabled>Category Menu</option>
                                                @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                        {{ $category->name }}</option>
                                                @empty
                                                    <option>No categories found</option>
                                                @endforelse
                                            </select>
                                            @error('categor_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Store</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="store_id">
                                                <option disabled>Stores Menu</option>
                                                @forelse ($stores as $store)
                                                    <option value="{{ $store->id }}" @selected($product->store_id == $store->id)>
                                                        {{ $store->name }}</option>
                                                @empty
                                                    <option>No stores found</option>
                                                @endforelse
                                            </select>
                                            @error('store_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4 row">
                                        <label class="form-label-title col-sm-3 mb-0">
                                            Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">Price (
                                            {{ App\ValueObjects\PriceValueObject::getCurrentCurrency() }} )</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $product->price }}" name="price"
                                                type="number" placeholder="0">
                                            @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">Discount Precentage( % )</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $product->discount_precentage }}"
                                                name="discount_precentage" type="number" placeholder="0">
                                            @error('discount_precentage')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">Quantity</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="in_stock" value="{{ $product->in_stock }}"
                                                type="number" placeholder="0">
                                            @error('in_stock')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Status</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="is_active">
                                                <option disabled>Status</option>
                                                <option value="1">Active</option>
                                                <option value="0" @selected($product->is_active == 0)>Not Active</option>
                                            </select>
                                            @error('is_active')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                        <div class="col-sm-9">
                                            <input value="{{ old('images') }}" class="form-control form-choose"
                                                name="images[]" type="file" id="formFile" multiple>
                                            @error('images')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-solid mt-4">update Product</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endsection
