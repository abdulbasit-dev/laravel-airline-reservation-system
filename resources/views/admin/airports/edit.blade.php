@extends('layouts.master')

@section('title')
  @lang('translation.edit_resource', ['resource' => __('attributes.airport')])
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.airport.airport')
    @endslot
    @slot('li_2')
      {{ route('airports.index') }}
    @endslot
    @slot('title')
      @lang('translation.edit_resource', ['resource' => __('attributes.airport')])
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
          <form class="needs-validation" novalidate action="{{ route('airports.update',$airport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.airport.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $airport->name) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.airport.name')])
                    </div>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <label for="city" class="col-sm-3 col-form-label">@lang('translation.airport.city')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="city" name="city_id" required>
                      <option value="">@lang('translation.none')</option>
                      @foreach ($cities as $key => $value)
                        <option value="{{ $key }}"  @selected($key === $airport->city_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.user.citie')])
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