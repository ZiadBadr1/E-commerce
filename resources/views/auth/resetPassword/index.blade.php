@extends('auth.layout')

@section('title', 'Reset Password')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('reset.index')}}" class="h2">Reset Password</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Please enter your email</p>

                <form action="{{ route('password.email') }}" method="post">
                    @csrf

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

                    <!-- /.col -->
                    <div class="col-14">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Send reset password link</button>
                    </div>
            </div>

            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
@endsection
