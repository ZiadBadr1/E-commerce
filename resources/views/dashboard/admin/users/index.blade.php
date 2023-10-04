@extends('layouts.master')
@section('title', 'Products')
@section('header-title', 'Users')


@section('content')
    <!-- Container-fluid starts-->
    {{-- <div class="page-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Users List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-danger" href="{{ route('admin.users.trash') }}">trashed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('dashboard.users._filters')

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
                                            <x-dashboard.admin.user :user="$user" />
                                        @empty
                                            <tr>
                                                <td colspan="8">No users found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- {{ $users->withQueryString()->links() }} --}}
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
    @endsection
