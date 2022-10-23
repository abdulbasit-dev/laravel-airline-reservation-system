@extends('layouts.master')

@section('title')
   @lang('translation.edit_resource', ['resource' => __('attributes.airline')])
@endsection


@section('plugin-css')
  <!-- Dropzone -->
  <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.airline.airline')
    @endslot
    @slot('li_2')
      {{ route('airlines.index') }}
    @endslot
    @slot('title')
       @lang('translation.edit_resource', ['resource' => __('attributes.airline')])
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
          <form class="needs-validation" novalidate action="{{ route('airlines.update', $airline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.airline.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $airline->name) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.airline.name')])
                    </div>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <label for="code" class="col-sm-3 col-form-label">@lang('translation.airline.code')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $airline->code) }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.airline.code')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="logo" class="col-sm-3 col-form-label">@lang('translation.airline.logo')</label>
                  <div class="col-sm-9" id="upload">
                    <div id="myDropzone" class="dropzone">
                      <div class="dz-message needsclick">
                        <div class="mb-3">
                          <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        <h4>@lang('translation.drop_here')</h4>
                      </div>
                    </div>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.airline.logo')])
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

@section('script')
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
  {{-- Dropzone Config --}}
  <script src="{{ URL::asset('assets/js/dropzone-config.js') }}"></script>
@endsection
