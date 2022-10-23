@extends('layouts.master-without-nav')

@section('title')
  @lang('translation.Register')
@endsection

@section('body')

  <body>
  @endsection

  @section('content')
    <div class="account-pages pt-sm-5 my-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-6">
            <div class="card overflow-hidden">
              <div class="bg-primary bg-soft">
                <div class="row">
                  <div class="col-7">
                    <div class="text-primary p-4">
                      <h5 class="text-primary">Register Yourself</h5>
                    </div>
                  </div>
                  <div class="col-5 align-self-end">
                    <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div>
                  <a href="{{ route('root') }}">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                        <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt="" class="rounded-circle" height="90">
                      </span>
                    </div>
                  </a>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="p-2">
                  <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name='name' placeholder="Enter name" value="{{ old('name') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.name')])
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name='email' placeholder="Enter email" value="{{ old('email') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.email')])
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="tel" class="form-control" id="phone" name='phone' placeholder="Enter phone" value="{{ old('phone') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.phone')])
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name='address' placeholder="Enter address" value="{{ old('address') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.address')])
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.password')])
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password Again" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('attributes.password_confirmation')])
                      </div>
                    </div>

                    <div class="d-grid mt-4">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="mt-5 text-center">

              <div>
                <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary">
                    Login</a> </p>
                <p>©
                  <script>
                    document.write(new Date().getFullYear())
                  </script> {{ config('app.name') }} Crafted with <i class="mdi mdi-heart text-danger"></i>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  @endsection
  @section('script')
    <!-- validation init -->
    <script src="{{ URL::asset('/assets/js/validation.init.js') }}"></script>
  @endsection
