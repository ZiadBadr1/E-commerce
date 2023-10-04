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
                            <h5>Users Trashed List</h5>
                            <div class="right-options">
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Phone Number</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>

                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="{{ $user->is_active ? 'status-close' : 'status-danger' }}">
                                                    <span>{{ $user->is_active ? 'Active' : 'Not Active' }}</span>
                                                </td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td class="status-close"><span>{{ ucwords($user->type) }}</span></td>
                                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $user->updated_at->format('Y-m-d') }}</td>

                                                <td>
                                                    <ul>

                                                        <li>
                                                            <form
                                                                action="{{ route('admin.users.restore', ['user' => $user]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="update-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i>Restore</i>
                                                                </button>
                                                            </form>
                                                        </li>

                                                        <li>
                                                            <form
                                                            action="{{ route('admin.users.force-delete', ['user' => $user]) }}"
                                                            method="POST">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button type="submit" class="delete-button"
                                                                    data-bs-toggle="modal"
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
                                {{--                                {{$products->links()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
    @endsection
