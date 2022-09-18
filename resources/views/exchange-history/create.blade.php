@extends('layouts.master')

@section('title')
  @lang('translation.usd_rate.usd_rate')
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.usd_rate.usd_rate')
    @endslot
    @slot('li_2')
      {{ route('exchange-history.index') }}
    @endslot
    @slot('title')
      @lang('translation.usd_rate.update_usd_rate')
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
          <form class="needs-validation" novalidate action="{{ route('exchange-history.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="usd" class="form-label">@lang('translation.exchange_history.usd')</label>
                  <input type="text" class="form-control" id="usd" name="usd" value="100" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.exchange_history.usd')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="iqd" class="form-label">@lang('translation.exchange_history.iqd')</label>
                  <input type="text" class="form-control" id="iqd" name="iqd" value="{{ old('iqd') }}" required>
                  
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.exchange_history.iqd')])
                  </div>
                </div>

                </div> <!-- end row -->
              </div>

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