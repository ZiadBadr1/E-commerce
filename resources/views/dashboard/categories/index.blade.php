@extends('layouts.master')
@section('title','Categories')
@section('header-title','Categories')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Category List</h5>
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="{{ route('categories.create') }}">Add Category</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                    <tr>
                                        <th>Category Image</th>
                                        <th>Category Name</th>
                                        <th>Parent Id</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse ($categories as $category)
                                        <tr>

                                                    <td><img src="{{asset('storage/'.$category->image)}} " height="60px"></td>



                                            <td>{{ $category->name }}</td>

                                            <td>{{ $category->parent_id}}</td>


                                            <td class="{{ $category->status ? 'status-close' : 'status-danger' }}">
                                                <span>{{ $category->status ? 'Active' : 'Not Active' }}</span>
                                            </td>

                                            <td>
                                                <ul>

                                                    <li>
                                                        <form
                                                            action="{{ route('categories.edit', $category->id) }}"
                                                            method="GET">
                                                            <button type="submit" class="update-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                <i class="ri-pencil-line"></i>
                                                            </button>
                                                        </form>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="submit" class="delete-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                <i class="ri-delete-bin-line"></i>
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
                                            <td colspan="8">No Category found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
        @endsection




