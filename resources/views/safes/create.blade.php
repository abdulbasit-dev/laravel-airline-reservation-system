@extends('layouts.master')

@section('title')
  @lang('translation.safe.add_safe')
@endsection



@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.safe.safe')
    @endslot
    @slot('li_2')
      {{ route('safes.index') }}
    @endslot
    @slot('title')
      @lang('translation.safe.add_safe')
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
          <form class="needs-validation" novalidate action="{{ route('safes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="name" class="form-label">@lang('translation.safe.name')</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe.name')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="address" class="form-label">@lang('translation.safe.address')</label>
                  <textarea class="form-control" rows="3" name="address" id="address" required>{{ old('address') }}</textarea>
                  
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe.address')])
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-check-label" for="is_active">
                    @lang('translation.active')
                  </label>
                  <select class="form-select" id="is_active" name="is_active" onchange="dateChanged()">
                    <option value=1>@lang('translation.active')</option>
                    <option value=0>@lang('translation.inactive')</option>
                  </select>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe.address')])
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