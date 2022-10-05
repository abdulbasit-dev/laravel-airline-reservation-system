@extends('layouts.master-without-nav')

@section('title')
  @lang('translation.Error_403')
@endsection

@section('body')

  <body>
  @endsection

  @section('content')
    <div class="account-pages my-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-5 text-center">
              <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>3</h1>
              <h4 class="text-uppercase">Sorry, you are not suppose to be in this page</h4>
              <div class="mt-5 text-center">
                <a class="btn btn-primary waves-effect waves-light" href="{{ auth()->user()->is_admin ? route('root') : route('profile') }}">Back to {{ auth()->user()->is_admin ? 'Dashbaord' : 'Profile' }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8 col-xl-6">
            <div>
              <img src="{{ URL::asset('/assets/images/error-img.png') }}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
