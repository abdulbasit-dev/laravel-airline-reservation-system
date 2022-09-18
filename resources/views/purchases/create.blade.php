@extends('layouts.master')

@section('title')
  @lang('translation.purchase.transfer')
@endsection

@section('plugin-css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <style>
    .desc{
      white-space: nowrap;
    width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    }
  </style>
@endsection



@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.purchase.purchases_received')
    @endslot
    @slot('li_2')
      {{ route('purchase-history.index') }}
    @endslot
    @slot('title')
      @lang('translation.purchase.transfer')
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
          <form class="needs-validation" novalidate action="{{ route('purchases.store',$purchase->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="supplier" class="form-label">@lang('translation.purchase.supplier')</label>
                  <input type="text" class="form-control" id="supplier" name="supplier" value="{{ old('supplier',$purchase->supplier->name) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.supplier')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="due" class="form-label">@lang('translation.purchase.due')</label>
                  <input type="text" class="form-control" id="due" name="due" value="{{ old('due',$purchase->due) }}" disabled>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.due')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="amount_paid" class="form-label">@lang('translation.purchase.amount_paid')</label>
                  <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="{{ old('amount_paid') }}">
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.amount_paid')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="exchange_type" class="form-label">@lang('translation.purchase.exchange_type')</label>
                  <select class="form-control" id="exchange_type" name="exchange_type" required>
                    <option value="USD">USD</option>
                    <option value="IQD">IQD</option>
                  </select>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.exchange_type')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="date" class="form-label">@lang('translation.purchase.date')</label>
                  <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                    <input type="text" class="form-control" id="start" name="date"  value="{{ old('date',$purchase->created_at) }}" required/>
                  </div>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.date')])
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="safe_id" class="form-label">@lang('translation.purchase.safe_id')</label>
                      <select class="form-control select2" id="safe_id" name="safe_id" required>
                        <option value=""></option>
                        @foreach ($safe as $safe)
                          <option value="{{ $safe->id }}">{{ $safe->name }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.purchase.safe_id')])
                      </div>
                    </div>
                  </div>

                </div> <!-- end row -->
              </div>
              <div class="col-4 table-responsive">
                <table class="table align-middle mb-0 table-nowrap" id="cart">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th colspan="2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($purchase->details as $detail)
                      <tr>
                        <td>
                            <h5 class="font-size-14 text-truncate"><a href="" class="text-dark">{{$detail->product->name}}</a></h5>
                            <p class="mb-0 desc">{{$detail->product->description}}</p>
                        </td>
                        <td>
                          <span id='p${product.id}'>{{$detail->product_price}}</span>  
                        </td>
                        <td>
                            <div style="width: 120px;">
                              <span>{{$detail->quantity}}</span>
                            </div>
                        </td>
                        <td>
                          <span id='t${product.id}'>{{$detail->total_price}}</span>  
                        </td>
                    </tr>
                  @empty
                      <tr><td>@lang('not_found')</td></tr>
                  @endforelse
                  <tr id="totalrow">
                    <td></td>
                    <td></td>
                    <td>@lang('translation.purchase.total'):</td>
                    <td id="total" class="total">{{$purchase->details->sum('total_price')}} </td>
                  </tr>
                    </tbody>
                </table>
              </div>
            </div>
              <div>
                <button type="submit" class="btn btn-primary w-md">@lang('buttons.submit')</button>
              </div>
              <br>
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


  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


  <script type="text/javascript">
    // Select2
    $(".select2").select2();
    $("#datepicker").datepicker();
  </script>
@endsection