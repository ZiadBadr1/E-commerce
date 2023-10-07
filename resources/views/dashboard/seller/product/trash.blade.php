@extends('dashboard.seller.layouts.master')
@section('title', 'Products')
@section('header-title', 'Products')


@section('content')
    <!-- Container-fluid starts-->
    {{-- <div class="page-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Products Trashed List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">import</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Export</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Store</th>
                                            <th>Current Qty</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            @if ($product->images->count() > 0)
                                                                <img src="{{ asset('storage/' . $product->images->first()->url) }}" class="img-fluid" alt="">
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>{{ $product->name }}</td>

                                                    <td>{{ $product->category->name }}</td>

                                                    <td>{{ $product->store->name }}</td>

                                                    <td>{{ $product->in_stock }}</td>

                                                    <td class="td-price">{{ (new App\ValueObjects\PriceValueObject($product->price))->getPrice() }}</td>

                                                    <td class="{{ $product->is_active ? 'status-close' : 'status-danger' }}">
                                                        <span>{{ $product->is_active ? 'Active' : 'Not Active' }}</span>
                                                    </td>

                                                    <td>
                                                        <ul>

                                                            <li>
                                                                <form action="{{ route('seller.products.restore', ['product' => $product]) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="update-button" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModalToggle">
                                                                        <i>Restore</i>
                                                                    </button>
                                                                </form>
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('seller.products.force-delete', ['product' => $product]) }}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf

                                                                    <button type="submit" class="delete-button" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModalToggle">
                                                                        <i>Delete</i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <style>
                                                    .delete-button {
                                                        background-color: #e74c3c;
                                                        color: #fff;
                                                        border: none;
                                                        padding: 10px 20px;
                                                        border-radius: 5px;
                                                        cursor: pointer;
                                                    }

                                                    .delete-button:hover {
                                                        background-color: #c0392b;
                                                    }

                                                    .update-button {
                                                        background-color: #27ae60;
                                                        color: #fff;
                                                        border: none;
                                                        padding: 10px 20px;
                                                        border-radius: 5px;
                                                        cursor: pointer;
                                                    }

                                                    .update-button:hover {
                                                        background-color: #219a52;
                                                    }


                                                </style>

                                            @empty

                                                <tr>
                                                <td colspan="8">No products found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
{{--                                {{$products->links()}}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
    @endsection
