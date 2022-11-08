@extends('layouts.master-without-nav')

@section('title')
  @lang('translation.Login')
@endsection

@section('body')

  <body>
  @endsection

  @section('content')
    <div class="account-pages pt-sm-5 my-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
              <div class="bg-primary bg-soft">
                <div class="row">
                  <div class="col-7">
                    <div class="text-primary p-4">
                      <h5 class="text-primary">Welcome Back !</h5>
                      <p>Sign in to continue to {{ config('app.name') }}.</p>
                    </div>
                  </div>
                  <div class="col-5 align-self-end">
                    <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="auth-logo">
                  <a href="index" class="auth-logo-light">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                        <img src="{{ URL::asset('/assets/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                      </span>
                    </div>
                  </a>

                  <a href="index" class="auth-logo-dark">
                    <div>
                      <a href="{{ route('root') }}">
                        <div class="avatar-md profile-user-wid mb-4">
                          <span class="avatar-title rounded-circle bg-light">
                            <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt="" class="rounded-circle" height="90">
                          </span>
                        </div>
                      </a>
                    </div>
                  </a>
                </div>
                <div class="p-2">
                  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'admin@airline.com') }}" id="email" placeholder="Enter Email" autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <div class="float-end">
                        @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                        @endif
                      </div>
                      <label class="form-label">Password</label>
                      <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" value="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                        <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember" {{ old('rememberd') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        Remember me
                      </label>
                    </div>

                    <div class="d-grid mt-3">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                        In</button>
                    </div>
                </form>
                <button class="btn btn-light btn-sm waves-effect waves-light mt-2" id="radnomeCustomer">Log
                  In With Randome Customer</button>
                </div>

              </div>
            </div>
            <div class="mt-5 text-center">
              <div>
                   <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary">
                                        Signup now </a> </p>
                <p>©
                  <script>
                    document.write(new Date().getFullYear())
                  </script> {{ config('app.name') }}. Crafted with <i class="mdi mdi-heart text-danger"></i>
                </p>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- end account-pages -->
  @endsection
  @push('scripts')
        <script>
            $(document).ready(function () {
                $("#radnomeCustomer").click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: "{{ route('randomCustomer') }}",
                        type: "GET",
                        success: function (data) {
                            $('#email').val(data.email);
                            $('#password').val("password");
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            
            });
        </script>
  @endpush
