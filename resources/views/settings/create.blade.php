@extends('layouts.master')

@section('title')
  @lang('translation.setting.add_setting')
@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.setting.setting')
    @endslot
    @slot('li_2')
      {{ route('settings.index') }}
    @endslot
    @slot('title')
      @lang('translation.setting.add_setting')
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
          <form class="needs-validation" novalidate action="{{ route('settings.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="key" class="col-sm-3 col-form-label">@lang('translation.setting.key')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.setting.key')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="value" class="col-sm-3 col-form-label">@lang('translation.setting.value')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.setting.value')])
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
