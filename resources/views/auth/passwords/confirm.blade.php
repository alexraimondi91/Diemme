@extends('auth/layout/layout')

@section('content')

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('index')}}"><b>Diemme</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Conferma password prima di continuare</p>
                <form action="{{ route('password.confirm') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email"
                            class="form-control @error('email') is-invalid @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Conferma password</button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Password dimentica
                            </a>
                            @endif
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @endsection