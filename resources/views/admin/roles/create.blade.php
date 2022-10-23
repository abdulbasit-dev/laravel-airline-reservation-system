@extends('layouts.master')

@section('title')
  @lang('translation.role.add_role')
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.role.role')
    @endslot
    @slot('li_2')
      {{ route('roles.index') }}
    @endslot
    @slot('title')
      @lang('translation.role.add_role')
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
          <form class="needs-validatio" novalidate action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.role.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.role.name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="permission" class="col-sm-3 col-form-label">@lang('translation.role.permissions')</label>
                  <div class="col-sm-9">
                    <span class="btn btn-info btn-sm mb-2 select-all">{{ trans('buttons.select_all') }}</span>
                    <span class="btn btn-info btn-sm deselect-all mb-2">{{ trans('buttons.deselect_all') }}</span></label>
                    <select class="form-control select2" id="permission" name="permission[]" multiple="multiple" required>
                      @foreach ($permissions as $id => $permissions)
                        <option value="{{ $id }}" @selected(in_array($id, old('permission', [])) || (isset($role) && $role->permissions->pluck('name')->contains($id)))>{{ $permissions }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.role.permissions')])
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
