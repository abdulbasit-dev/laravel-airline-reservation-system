@extends('layouts.master')

@section('title')
  @lang('translation.client.edit_client')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.client.client')
    @endslot
    @slot('li_2')
      {{ route('clients.index') }}
    @endslot
    @slot('title')
      @lang('translation.client.edit_client')
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
          <form class="needs-validation" novalidate action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.client.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="category" class="col-sm-3 col-form-label">@lang('translation.client.category')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="category" name="category" required>
                      <option value=""></option>
                      @foreach ($clientCategories as $key => $value)
                        <option value="{{ $key }}" @selected($key == $client->category_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.category')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone" class="col-sm-3 col-form-label">@lang('translation.client.phone')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.phone')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone_alt" class="col-sm-3 col-form-label">@lang('translation.client.phone_alt')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone_alt" name="phone_alt" value="{{ old('phone_alt', $client->phone_alt) }}">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.phone_alt')])
                    </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <label for="address" class="col-sm-3 col-form-label">@lang('translation.client.address')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $client->address) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.address')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">@lang('translation.client.loan_limit')</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="loan_limit" name="loan_limit" value="{{ old('loan_limit', $client->loan_limit) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.loan_limit')])
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
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      // Select2
      $(".select2").select2();
    });
  </script>
@endsection
