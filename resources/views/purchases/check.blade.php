@extends('layouts.master')

@section('title')
  @lang('translation.purchase.transfer')
@endsection

@section('plugin-css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- bootstrap-touchspin css -->
  <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection



@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.purchase.purchase')
    @endslot
    @slot('li_2')
      {{ route('purchase-history.index') }}
    @endslot
    @slot('title')
      @lang('translation.purchase.purchase')
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
          <form class="needs-validation" id="form" novalidate action="{{route("purchases.add")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="supplier" class="form-label">@lang('translation.purchase.supplier')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="supplier" name="supplier_id" required>
                      @foreach ($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.purchase.supplier')])
                    </div>
                  </div>
                </div>
                  <div class="row mb-2">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="exchange_type" class="form-label">@lang('translation.purchase.exchange_type')</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="exchange_type" name="exchange_type" required>
                            <option value="USD">USD</option>
                            <option value="IQD">IQD</option>
                          </select>
                          <div class="valid-feedback">
                            @lang('validation.good')
                          </div>
                          <div class="invalid-feedback">
                            @lang('validation.required', ['attribute' => __('translation.client.exchange_type')])
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="date" class="form-label">@lang('translation.purchase.date')</label>
                        <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                          <input type="text" class="form-control" id="start" name="date"  value="{{ old('date') }}" required/>
                        </div>
      <div class="valid-feedback">
                          @lang('validation.good')
                        </div>
                        <div class="invalid-feedback">
                          @lang('validation.required', ['attribute' => __('translation.purchase.date')])
                        </div>
                        </div>
                      </div>
                    </div>
  
                  </div> <!-- end row -->


                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="safe_id" class="form-label">@lang('translation.purchase.safe_id')</label>
                      <select class="form-control select2" id="safe_id" name="safe_id">
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

                  <div class="col-md-6">
                    <div class="mb-3">
                  <label for="amount_paid" class="form-label">@lang('translation.purchase.amount_paid')</label>
                  <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="{{ old('amount_paid') }}">
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.purchase.amount_paid')])
                
                    </div>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="note" class="form-label">@lang('translation.purchase.note')</label>
                    <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.purchase.note')])
                  
                      </div>
                      </div>

                  <div class="mb-4">
                    <label for="supplier" class="form-label">@lang('translation.purchase.products')</label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="produtcs">
                        <option value="">@lang('translation.purchase.choose_product')</option>
  
                      </select>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.purchase.product')])
                      </div>
                    </div>
                  </div>
                  <input class="total" type="hidden" name="total">
                </div> <!-- end row -->
            </div>
              <br>
              <div class="row">
                <div class="col-xl-12">
                            <div class="table-responsive">
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
{{-- data here --}}
                                    <tr id="totalrow">
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td id="total" class="total">0.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            


                            <div class="row mt-4">
                                {{-- <div class="col-sm-6">
                              
                                </div> <!-- end col --> --}}
                                <div class="col-sm-6">
                                    <div class="text-sm-end mt-2 mt-sm-0">
                                      <button type="submit" class="btn btn-success w-lg">  <i class="mdi mdi-cart-arrow-right me-1"></i> @lang('buttons.submit')</button>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>

                    <!-- end card -->
                </div>

              </form>
            </div>


        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>
@endsection

@section('script')
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

  <!-- bootstrap-touchspin -->
  <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>


  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

  <script type="text/javascript">
    // Select2
    $(".select2").select2();
    $("#datepicker").datepicker();

    function initTouchSpin(){
          //touchspin
      $(".quantity").TouchSpin({verticalbuttons:false,min:1,max:9999999});
    }

    initTouchSpin();

    let productSelect = $("#produtcs").select2();
    let products = [];
    let qwerty = [];
    let chosenProducts = [];

    $('#supplier').on('select2:select', function (e) {
      productSelect.html('');
      $("#totalrow").siblings().remove();
      chosenProducts=[];
      load();
      callTotal();
    });

    productSelect.on('select2:select', function (e) {
      let id = e.params.data.id;
      if(!id){
        return swal.fire("error","@lang('choose_product')!");
      }
      chosen = chosenProducts.find((item) => item.id==id);
      if( chosen !=null){
        console.log("Duplicate");

        $("#q"+id).val( parseInt($("#q"+id).val())+1);
        chosen.quantity+=1;
        $(`#t${id}`).text( getPrice(chosen) * chosen.quantity);
        $(`#totalarray${id}`).val( getPrice(chosen) * chosen.quantity);

        callTotal();
        return 1;
      }

      let product = products.find((item) => item.id==id)
      product.quantity=1;
      chosenProducts.push(product);
      addItem(product);
      callTotal();
  });

  function remove(row,id){
    $(row).parent().parent().remove();
    chosenProducts = chosenProducts.filter((item) => item.id != id);
    callTotal();
  }
  function getPrice(product){
      return product.purchase_price ?? product.purchase_box_price;
      }
  

    function changeQuantity(id,element){
      chosen = chosenProducts.find((item) => item.id==id);
      chosen.quantity = $(element).val();
      $(`#t${id}`).text( getPrice(chosen) * $(element).val());
      $(`#totalarray${id}`).val( getPrice(chosen) * $(element).val());
      callTotal();
    }
    function callTotal(){
      total=0;
      chosenProducts.map((product)=>{
        total+= getPrice(product) * product.quantity;
      });
      $(".total").text(""+total);
      $(".total").val(total);
    }
    function addItem(product){
    newRow= `<tr>
              <td>
                  <h5 class="font-size-14 text-truncate"><a href="" class="text-dark">${product.text}</a></h5>
                  <p class="mb-0">${product.description.substring(0, 30)}...</p>
                  <input type="hidden" name="id[${product.id}]" value="${product.id}">
              </td>
              <td>
                <span id='p${product.id}'>${getPrice(product)}</span>  
                <input type="hidden" name="price[${product.id}]" value="${getPrice(product)}">
              </td>
              <td>
                  <div style="width: 120px;">
                    <input class="quantity" type="text" id='q${product.id}' value="1" name="quantity[${product.id}]" onchange='changeQuantity(${product.id},this)'>
                  </div>
              </td>
              <td>
                <span id='t${product.id}'>${getPrice(product)}</span>  
                <input type="hidden" id="totalarray${product.id}" name="totalarray[${product.id}]" value="${getPrice(product)}">
              </td>
              <td>
                  <button onclick="remove(this,${product.id})" class="btn btn-danger"> <i
                          class="mdi mdi-trash-can font-size-18"></i></button>
              </td>
          </tr>`;
  $(newRow).insertBefore($('#totalrow'));
    initTouchSpin();
    }
    function load(){
          $.ajax({
            type: 'POST',
            url: "{{route('products.by-supplier')}}",
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data:{
              "supplier_id":$("#supplier").find(":selected").val(),
            },
          }).then(function (data) {
            products = data.data;
            // products=products.map((key) => key.quantity=1);
            // data.data.map((key) => qwerty[key.id] = [key.text,key.purchase_price]);

            productSelect.select2({
                data: data.data
              })
          });
      }
    $(function() {
      load();
});
  </script>
@endsection
