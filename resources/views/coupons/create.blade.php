@extends('layouts.master')

@section('title')
  @lang('translation.coupon.add_coupon')
@endsection

@section('css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.coupon.coupon')
    @endslot
    @slot('li_2')
      {{ route('coupons.index') }}
    @endslot
    @slot('title')
      @lang('translation.coupon.add_coupon')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="needs-validation" novalidate action="{{ route('coupons.store') }}" autocomplete="off" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="code" class="col-sm-3 col-form-label">@lang('translation.coupon.code')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.code')])
                    </div>
                  </div>
                </div>

                {{-- <div class="row mb-4">
                  <label for="type" class="col-sm-3 col-form-label">@lang('translation.coupon.type')</label>
                  <div class="col-sm-9">
                    <select class="form-select select2" id="type" name="type" required>
                      @foreach ($types as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.type')])
                    </div>
                  </div>
                </div> --}}

                <div class="row mb-4">
                  <label for="discount_type" class="col-sm-3 col-form-label">@lang('translation.coupon.discount_type')</label>
                  <div class="col-sm-9">
                    <select class="form-select select2" id="discount_type" name="discount_type" required>
                      @foreach ($discountTypes as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.discount_type')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="discount" class="col-sm-3 col-form-label">@lang('translation.coupon.discount')</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.discount')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="start_date" class="col-sm-3 col-form-label">@lang('translation.coupon.start_date')</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="start_date" autocomplete="new-start-date"  name="start_date" value="{{ old('start_date', date('Y-m-d')) }}">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.start_date')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="end_date" class="col-sm-3 col-form-label">@lang('translation.coupon.end_date')</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="end_date" autocomplete="new-end-date"  name="end_date" value="{{ old('end_date', date('Y-m-d')) }}">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.coupon.end_date')])
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">@lang('buttons.submit')</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>
@endsection

@section('script')
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      // Select2
      $(".select2").select2();
    });
  </script>
@endsection
