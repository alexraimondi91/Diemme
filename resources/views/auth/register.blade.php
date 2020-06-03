@extends('auth/layout/layout')

@section('content')

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="{{route('index')}}"><b>Diemme</b></a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Registrazione</p>
        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror"
              name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
              @error('name')
              <span id="exampleInputEmail1-error" class="error invalid-feedback">
                {{$message}}
              </span>
              @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="surname_user" placeholder="Cognome" type="text" class="form-control " name="surname_user"
              required autocomplete="surname" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="fiscalCode_user" placeholder="Codice Fiscale" type="text" class="form-control"
              name="fiscalCode_user" required autocomplete="fiscalCode_user" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="address_user" placeholder="Via" type="text" class="form-control" name="address_user" required
              autocomplete="address_user" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="country_user" placeholder="Regione" type="text" class="form-control" name="region_user" required
              autocomplete="country_user" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="country_user" placeholder="Nazione" type="text" class="form-control" name="country_user" required
              autocomplete="country_user" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="country_user" placeholder="Città" type="text" class="form-control" name="city_user" required
              autocomplete="country_user" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" required autocomplete="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
              @error('email')
              <span id="exampleInputEmail1-error" class="error invalid-feedback">
                {{$message}}
              </span>
              @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" placeholder="Password minimo 8 caratteri" type="password"
              class="form-control @error('password') is-invalid @enderror @error('password.min') is-invalid @enderror " name="password" required
              autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span id="exampleInputPassword-error" class="error invalid-feedback">
              {{$message}}
            </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input id="password-confirm" placeholder="Conferma password" type="password" class="form-control"
              name="password_confirmation" required autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" required id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                Accetto i <a href="{{route('terms')}}">termini</a> di registrazione
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Registrati</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{route('login')}}" class="text-center">Sono già registrato</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  @endsection