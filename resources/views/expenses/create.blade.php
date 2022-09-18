@extends('layouts.master')

@section('title')
  @lang('translation.expense.add_expense')
@endsection

@section('css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.expense.expense')
    @endslot
    @slot('li_2')
      {{ route('expenses.index') }}
    @endslot
    @slot('title')
      @lang('translation.expense.add_expense')
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
          <form class="needs-validation" novalidate action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-xl-8">

                <div class="row mb-4">
                  <label for="title" class="col-sm-3 col-form-label">@lang('translation.expense.title')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.title')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="description" class="col-sm-3 col-form-label">@lang('translation.expense.description')</label>
                  <div class="col-sm-9">
                    <input type="description" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.description')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="file" class="col-sm-3 col-form-label">@lang('translation.expense.image')</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="file" name="image" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.price')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="price" class="col-sm-3 col-form-label">@lang('translation.expense.price')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="price" name="price" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.price')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="safe_id" class="col-sm-3 col-form-label">@lang('translation.expense.safe')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="safe_id" name="safe_id" required>
                      <option value=""></option>
                      @foreach ($safes as $safe)
                        <option value="{{ $safe->id }}">{{ $safe->name }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.safe_id')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="tag" class="col-sm-3 col-form-label">@lang('translation.expense.tag')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="tag" name="tag_id" required>
                      <option value=""></option>
                      @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.expense.tag_id')])
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
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      // Select2
      $(".select2").select2();
    });
  </script>
@endsection
