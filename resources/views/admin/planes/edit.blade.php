@extends('layouts.master')

@section('title')
  @lang('translation.edit_resource', ['resource' => __('attributes.plane')])
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.plane.plane')
    @endslot
    @slot('li_2')
      {{ route('planes.index') }}
    @endslot
    @slot('title')
      @lang('translation.edit_resource', ['resource' => __('attributes.plane')])
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
          <form class="needs-validation" novalidate action="{{ route('planes.update', $plane->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.plane.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plane->name) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.plane.name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="airline" class="col-sm-3 col-form-label">@lang('translation.plane.plane')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="airline" name="airline_id" required>
                      <option value="" selected>@lang('translation.none')</option>
                      @foreach ($airlines as $key => $value)
                        <option value="{{ $key }}" @selected($key ===$plane->airline_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.user.airline')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="code" class="col-sm-3 col-form-label">@lang('translation.plane.code')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $plane->code) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.plane.code')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="capacity" class="col-sm-3 col-form-label">@lang('translation.plane.capacity')</label>
                  <div class="col-sm-9">
                    <input type="number" min="80" max="300" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $plane->capacity) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.plane.capacity')])
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">@lang('buttons.update')</button>
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
