@extends('dashboard.seller.layouts.master')
@section('title', 'Categories')
@section('header-title', 'Categories')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Category List</h5>


                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-success" href="">Ask To Add</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('components.dashboard.seller.search')
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Category Image</th>
                                            <th>Category Name</th>
                                            <th>Parent Id</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>

                                                <td><img src="{{ asset('storage/' . $category->image) }} " height="60px">
                                                </td>



                                                <td>{{ $category->name }}</td>

                                                <td>
                                                    @if (isset($category->parent->name))
                                                        {{ $category->parent->name }}
                                                    @endif
                                                </td>
                                            </tr>


                                        @empty
                                            <tr>
                                                <td colspan="8">No Category found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 15px ;direction: rtl">

                        {{ $categories->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
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
    @endsection
