@extends('layouts.master')

@section('title')
  @lang('translation.supplier.add_supplier')
@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.supplier.supplier')
    @endslot
    @slot('li_2')
      {{ route('suppliers.index') }}
    @endslot
    @slot('title')
      @lang('translation.supplier.add_supplier')
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
          <form class="needs-validation" novalidate action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.supplier.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.supplier.name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="company_name" class="col-sm-3 col-form-label">@lang('translation.supplier.company_name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.supplier.company_name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="address" class="col-sm-3 col-form-label">@lang('translation.supplier.address')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.supplier.address')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone" class="col-sm-3 col-form-label">@lang('translation.supplier.phone')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.supplier.phone')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone_alt" class="col-sm-3 col-form-label">@lang('translation.supplier.phone_alt')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone_alt" name="phone_alt" value="{{ old('phone_alt') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.supplier.phone_alt')])
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
