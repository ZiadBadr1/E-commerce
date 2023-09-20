@extends('auth.layout')

@section('title', 'Login')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login.index') }}" class="h1">Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Welcome Back</p>

                <form action="{{ route('login.store') }}" method="post">
                    @csrf

                    @if (Session::has('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                            name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div style="display: flex; flex-direction:column; align-items: flex-start;">
                        <a href="#login" class="text-center">I forget my password</a>
                        <a href="{{ route('register.index') }}" class="text-center">I don't have a membership</a>
                    </div>

                    <!-- /.col -->
                    <div class="col-14">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                    </div>
                    <hr>

                    <div class="social-auth-links text-center">
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Login using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Loigin using Google+
                        </a>
                    </div>
            </div>

            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
@endsection
