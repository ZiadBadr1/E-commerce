@extends('layouts.master')
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
                            <h5>Products List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">import</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Export</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-solid" href="{{ route('products.create') }}">Add Product</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-danger" href="{{ route('products.trash') }}">trashed</a>
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
                                        <x-dashboard.product :product="$product" />
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
