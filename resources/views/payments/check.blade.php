@extends('layouts.master')

@section('title')
  @lang('translation.payment_history.transfer')
@endsection

@section('plugin-css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection



@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.payment_history.payments_received')
    @endslot
    @slot('li_2')
      {{ route('payment-history.index') }}
    @endslot
    @slot('title')
      @lang('translation.payment_history.transfer')
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
          <form class="needs-validation" novalidate action="{{ route('payment-history.collect',$payment_history->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">
                
                <div class="mb-4">
                  <label for="user" class="form-label">@lang('translation.payment_history.user')</label>
                  <input type="text" class="form-control" id="user" name="user" value="{{ old('user',$payment_history->user->name) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.user')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="client" class="form-label">@lang('translation.payment_history.client')</label>
                  <input type="text" class="form-control" id="client" name="client" value="{{ old('client',$payment_history->client->name) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.client')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="amount_paid" class="form-label">@lang('translation.payment_history.amount_paid')</label>
                  <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="{{ old('amount_paid',$payment_history->amount_paid) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.amount_paid')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="exchange_type" class="form-label">@lang('translation.payment_history.exchange_type')</label>
                  <input type="text" class="form-control" id="exchange_type" name="exchange_type" value="{{ old('exchange_type',$payment_history->exchange_type) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.exchange_type')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="usd_rate" class="form-label">@lang('translation.payment_history.usd_rate')</label>
                  <input type="text" class="form-control" id="usd_rate" name="usd_rate" value="{{ old('usd_rate',$payment_history->usd_rate) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.usd_rate')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="date" class="form-label">@lang('translation.payment_history.date')</label>
                  <input type="text" class="form-control" id="date" name="date" value="{{ old('date',$payment_history->date) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.payment_history.date')])
                  </div>
                </div>

                {{-- category & supplier --}}
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="safe_id" class="form-label">@lang('translation.payment_history.safe_id')</label>
                      <select class="form-control select2" id="safe_id" name="safe_id" required>
                        <option value=""></option>
                        @foreach ($safe as $safe)
                          <option value="{{ $safe->id }}">{{ $safe->name }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.payment_history.safe_id')])
                      </div>
                    </div>
                  </div>

                </div> <!-- end row -->

              <div>
                <button type="submit" class="btn btn-primary w-md">@lang('buttons.submit')</button>
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



  <script type="text/javascript">
    // Select2
    $(".select2").select2();
  </script>
@endsection
