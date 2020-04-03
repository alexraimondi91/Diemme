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
          <p class="login-box-msg">Verifica la tua email</p>
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
              Un link di verifica è stata inviata alla tua casella email
          </div>
          @endif
          <p>Prima di provcedere, per favore verifica la tua casella email per il link di verifica</p>
          <p>Se non hai ricevuto la email provedi</p>
          <form action="{{ route('verification.resend') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Effettua nuovamente la richiesta</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection
