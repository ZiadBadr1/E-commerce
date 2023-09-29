@extends('auth.layout')

@section('title', 'Login')
@section('content')
    <section class="log-in-section section-b-space">
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Our E-commerce</h3>
                            <h4>Log In Your Account</h4>
                        </div>

                        @if(session('fail'))
                            <p class="text-danger">
                                {{ session('fail') }}
                            </p>
                        @endif
                        <div class="input-box">
                            <form class="row g-2" method="POST" action="{{ route('login.store') }}">
                                @csrf
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
                                    <div class="forgot-box">
                                        <div class="row">
                                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                                            <a href="{{ route('register.index') }}" class="forgot-password mt-2">Don't have an account?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                        In</button>
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
                                            alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Log In with Facebook
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
