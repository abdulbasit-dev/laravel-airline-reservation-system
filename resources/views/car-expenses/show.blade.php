@extends('layouts.master')

@section('title')
  @lang('translation.car_expense.car_expense_info')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.car_expense.car_expense')
    @endslot
    @slot('li_2')
      {{ route('car-expenses.index') }}
    @endslot
    @slot('title')
      @lang('translation.car_expense.car_expense_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-xl-6">
              <div class="mt-5">
                <h5 class="mb-3">@lang('translation.car_expense.car_expense_info')</h5>
                <div class="table-responsive">
                  <table class="table-borderless mb-0 table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car_expense.car_model')</th>
                        <td>{{ $carExpense->car->model }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car.plate_number')</th>
                        <td>{{ $carExpense->car->plate_number }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car_expense.title')</th>
                        <td>{{ $carExpense->title }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car_expense.description')</th>
                        <td>{{ $carExpense->description }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car_expense.driver_name')</th>
                        <td>{{ $carExpense->user->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car_expense.price')</th>
                        <td>{{ formatPrice($carExpense->price) }}</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- end Specifications -->
            <div class="col-xl-6">
              <a class="carExpenseImageLightBox" href="{{ getFile($carExpense) }}">
                <img alt="car expense image" src="{{ getFile($carExpense) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto">
              </a>
            </div>

          </div>
          <!-- end row -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->
@endsection
@section('script')
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

  <script>
    $(".carExpenseImageLightBox").magnificPopup({
      type: "image",
      closeOnContentClick: !0,
      closeBtnInside: !1,
      fixedContentPos: !0,
      mainClass: "mfp-no-margins mfp-with-zoom",
      image: {
        verticalFit: !0
      },
      zoom: {
        enabled: !0,
        duration: 300
      }
    })
  </script>
@endsection
