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

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

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
          <form class="needs-validation" novalidate action="{{ route('safe-transactions.store',$safe) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="transaction_by" class="form-label">@lang('translation.safe_transaction.transaction_by')</label>   
                  <select name="transaction_by" id="transaction_by" class="form-control select2" data-placeholder="Choose ...">          
                    @foreach ($users as $user)
                    <option value="{{$user->id}}" @selected(old('transaction_by')==$user->id)>{{$user->name}}</option>
                    @endforeach
                  </select>

                <div class="mb-4">
                  <label for="type" class="form-label">@lang('translation.safe_transaction.type')</label>                  
                  <select name="type" id="name" class="form-control" data-placeholder="Choose ...">
                    <option value="deposit" @selected(old('type')=="deposit")>@lang('translation.safe_transaction.deposit')</option>
                    <option value="withdraw" @selected(old('type')=="withdraw")>@lang('translation.safe_transaction.withdraw')</option>
                  </select>

                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe-transaction.type')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="amount" class="form-label">@lang('translation.safe_transaction.amount')</label>                  
                  <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe-transaction.amount')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="datepicker2">@lang('translation.safe_transaction.date')</label>
                  <div class="input-group" id="datepicker2">
                      <input type="text" name="date" class="form-control" placeholder="yyyy-mm-dd"
                          data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                          data-provide="datepicker" data-date-autoclose="true" value="{{ old('date') }}">
                      <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                  </div><!-- input-group -->
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe_transaction.date')])
                  </div>
              </div>

                <div class="mb-4">
                  <label for="note" class="form-label">@lang('translation.safe_transaction.note')</label>
                  <textarea class="form-control" rows="3" name="note" id="note" required>{{ old('note') }}</textarea>
                  
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.safe_transaction.note')])
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

@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script>
      $(".select2").select2();
    </script>
@endsection