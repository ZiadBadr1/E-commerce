@extends('auth.layout')

@section('title', 'Reset Password')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1">Reset Password</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Please enter your email</p>

                <form action="{{ route('password.reset.update') }}" method="post">
                    @csrf
                    @input(['name' => 'token', 'value' => $token])
                    @input(['name' => 'email', 'value' => $email])
                    @if (Session::has('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif

                    @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password" value="{{ old('password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Reenter password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- /.col -->
                    <div class="col-14">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Change password</button>
                    </div>
            </div>

            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
@endsection
