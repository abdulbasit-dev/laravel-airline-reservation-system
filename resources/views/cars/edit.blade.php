@extends('layouts.master')

@section('title')
  @lang('translation.car.edit_car')
@endsection

@section('css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.car.car')
    @endslot
    @slot('li_2')
      {{ route('cars.index') }}
    @endslot
    @slot('title')
      @lang('translation.car.edit_car')
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
          <form class="needs-validatio" novalidate action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-xl-8">

                <div class="row mb-4">
                  <label for="model" class="col-sm-3 col-form-label">@lang('translation.car.model')</label>
                  <div class="col-sm-9">
                    <input type="model" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.car.model')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="plate_number" class="col-sm-3 col-form-label">@lang('translation.car.plate_number')</label>
                  <div class="col-sm-9">
                    <input type="plate_number" class="form-control" id="plate_number" name="plate_number" value="{{ old('plate_number', $car->plate_number) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="driver_name" class="col-sm-3 col-form-label">@lang('translation.car.driver_name')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="driver_name" name="driver" required>
                      <option value=""></option>
                      @foreach ($drivers as $key => $value)
                        <option value="{{ $key }}" @selected(old('driver', $car->user_id) == $key)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.car.driver_name')])
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
