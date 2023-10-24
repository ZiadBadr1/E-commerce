@extends('dashboard.admin.layouts.master')
@section('title', 'Stores')
@section('header-title', 'Stores')


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
                                    <h5>Store Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                    action="{{ route('admin.store.update', ['store' => $store]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Store
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" disabled name="name" type="text"
                                                placeholder="Store Name" value="{{ $store->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex align-items-center mb-4 row">
                                        <label class="form-label-title col-sm-3 mb-0">
                                            Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" disabled class="form-control" rows="3">{{ $store->description }}</textarea>
                                            @error('description')
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
                                                <option value="0" @selected($store->is_active == 0)>Not Active</option>
                                            </select>
                                            @error('is_active')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-solid mt-4">Update Store</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endsection
