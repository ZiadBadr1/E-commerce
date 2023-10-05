@extends('dashboard.admin.layouts.master')
@section('title', 'Edit User')
@section('header-title', 'Edit User')


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
                                    <h5>User Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                    action="{{ route('admin.users.update', ['user' => $user]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" disabled name="name" type="text"
                                                placeholder="User Name" value="{{ $user->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4 row">
                                        <label class="form-label-title col-sm-3 mb-0">
                                            Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" disabled name="email" value="{{ $user->email }}" class="form-control" rows="3"></input>
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" disabled value="{{ $user->phone_number }}" name="phone_number"
                                                type="tel" placeholder="0">
                                            @error('phone_number')
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
                                                <option value="0" @selected($user->is_active == 0)>Not Active</option>
                                            </select>
                                            @error('is_active')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-solid mt-4">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endsection
