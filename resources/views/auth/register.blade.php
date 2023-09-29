@extends('auth.layout')

@section('title', 'Register')
@section('content')
    <section class="log-in-section section-b-space">
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Our E-commerce</h3>
                            <h4>Create a new account</h4>
                        </div>

                        @if (session('fail'))
                            <p class="text-danger">
                                {{ session('fail') }}
                            </p>
                        @endif
                        <div class="input-box">
                            <form class="row g-2" method="POST" action="{{ route('register.store') }}">
                                @csrf

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="string" name="name" class="form-control" id="name"
                                            placeholder="Name Address" value="{{ old('name') }}">
                                        <label for="name">Name</label>
                                        @error('name')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email Address" value="{{ old('email') }}">
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="tel" name="phone_number" class="form-control" id="phone_number"
                                            placeholder="Phone_number Address" value="{{ old('phone_number') }}">
                                        <label for="phone_number">Phone Number</label>
                                        @error('phone_number')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" placeholder="Repeat Password">
                                        <label for="password_confirmation">Repeat Password</label>
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                        <label>Select Type:</label>
                                        <select name="type" id="userType" class="form-control">
                                            <option value="user" selected>User</option>
                                            <option value="seller">Seller</option>
                                        </select>
                                    </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="row">
                                            <a href="{{ route('register.index') }}" class="forgot-password mt-2">Already have an account?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Register</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                            alt=""> Register with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Register with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
