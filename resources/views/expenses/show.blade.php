@extends('layouts.master')

@section('title')
  @lang('translation.expense.expense')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.expense.expense')
    @endslot
    @slot('li_2')
      {{ route('expenses.index') }}
    @endslot
    @slot('title')
      @lang('translation.expense.expense_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-xl-6">
              <div class="mt-5">
                <h5 class="mb-3">@lang('translation.expense.expense_info')</h5>
                <div class="table-responsive">
                  <table class="table-borderless mb-0 table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.expense.title')</th>
                        <td>{{ $expense->title }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.expense.description')</th>
                        <td>{{ $expense->description }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.expense.price')</th>
                        <td>{{ formatPrice($expense->price) }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.expense.user')</th>
                        <td>{{ $expense->user->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.expense.tag')</th>
                        <td>{{ $expense->tag->name }}</td>
                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- end Specifications -->
            <div class="col-xl-6">
              <a class="expenseImageLightBox" href="{{ getFile($expense) }}">
                <img alt="car expense image" src="{{ getFile($expense) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto">
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
    $(".expenseImageLightBox").magnificPopup({
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
