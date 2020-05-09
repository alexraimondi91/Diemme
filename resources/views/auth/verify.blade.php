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
          <p>Per poter completare la registrazione è necessario verificare la tua email </p>
          <p>Se non hai ancora ricevuto una mail di conferma clicca sul bottone sottostante</p>
          <form action="{{ route('verification.resend') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Invia nuova mail di verifica</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection
