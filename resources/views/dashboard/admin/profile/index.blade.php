@extends('dashboard.admin.layouts.master')
@section('title', 'Profile')
@section('header-title', 'Profile')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Details Start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Profile Setting</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                      action="{{route('profile.update')}}">
                                    @csrf
                                    @method('PUT')
                                    @if (Session::has('success_data'))
                                        <div class="alert alert-success">{{ Session::get('success_data') }}</div>
                                    @endif
                                    <div class="row">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="name"
                                                       placeholder="Enter Your Name" value="{{$user->name}}">
                                            </div>
                                            @error('name')
                                            <p class="text-danger" style="margin-left: 17%">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Your Phone
                                                Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="phone_number"
                                                       value="{{$user->phone_number}}"
                                                       placeholder="Enter Your Number">
                                            </div>
                                            @error('phone_number')
                                            <p class="text-danger" style="margin-left: 17%">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-solid mt-4">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Details End -->
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Profile Setting</h5>
                                </div>
                                <form class="theme-form theme-form-2 mega-form"
                                      action="{{route('profile.changePassword')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if (Session::has('success_change'))
                                        <div class="alert alert-success">{{ Session::get('success_change') }}</div>
                                    @endif
                                    @if (Session::has('error_change'))
                                        <div class="alert alert-danger">{{ Session::get('error_change') }}</div>
                                    @endif

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Current Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" name="current_password"
                                                   placeholder="Enter Your Password">
                                        </div>
                                        @error('current_password')
                                        <p class="text-danger" style="margin-left: 17%">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">New Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" name="password"
                                                   placeholder="Enter Your Password">
                                        </div>
                                        @error('password')
                                        <p class="text-danger" style="margin-left: 17%">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Confirm
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" name="password_confirmation"
                                                   placeholder="Enter Your Confirm Passowrd">
                                        </div>
                                        @error('password_confirmation')
                                        <p class="text-danger" style="margin-left: 17%">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-solid mt-4">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
