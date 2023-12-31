@extends('dashboard.admin.layouts.master')
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
                                        <a class="btn btn-danger" href="{{ route('admin.products.trash') }}">trashed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('dashboard.admin.product._filters')

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
                                            <th>Discount Precentage</th>
                                            <th>Price After Discount</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    `
                                    <tbody>
                                        @forelse ($products as $product)
                                            <x-dashboard.admin.product :product="$product" />
                                        @empty
                                            <tr>
                                                <td colspan="8">No products found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
    @endsection
