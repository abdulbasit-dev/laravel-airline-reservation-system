@extends('layouts.master')

@section('title')
  @lang('translation.product.add_product')
@endsection

@section('plugin-css')
  <!-- Plugins css -->
  <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection



@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.product.product')
    @endslot
    @slot('li_2')
      {{ route('products.index') }}
    @endslot
    @slot('title')
      @lang('translation.product.add_product')
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
          <form class="needs-validation" novalidate action="{{ route('products.store') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="mb-4">
                  <label for="name" class="form-label">@lang('translation.product.product_name')</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.product.product_name')])
                  </div>
                </div>

                <div class="mb-4">
                  <label for="description" class="form-label">@lang('translation.product.description')</label>
                  <textarea class="form-control" rows="3" name="description" id="description" required>{{ old('description') }}</textarea>

                  <div class="valid-feedback">
                    @lang('validation.good')
                  </div>
                  <div class="invalid-feedback">
                    @lang('validation.required', ['attribute' => __('translation.product.description')])
                  </div>
                </div>

                {{-- category & supplier --}}
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="supplier" class="form-label">@lang('translation.product.supplier')</label>
                      <select class="form-control select2" id="supplier" name="supplier" required>
                        <option value=""></option>
                        @foreach ($suppliers as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.supplier')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="category" class="form-label">@lang('translation.product.category')</label>
                      <select class="form-control select2" id="category" name="category" required>
                        <option value=""></option>
                        @foreach ($categories as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.category')])
                      </div>
                    </div>
                  </div>

                </div> <!-- end row -->

                <div class="row mb-2">

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="barcode" class="form-label">@lang('translation.product.barcode')</label>
                      <input type="number" class="form-control" id="barcode" name="barcode" value="{{ old('barcode') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.barcode')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="low_stock_quantity" class="form-label">@lang('translation.product.low_stock_quantity')</label>
                      <input type="number" class="form-control" id="low_stock_quantity" name="low_stock_quantity" value="{{ old('low_stock_quantity') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.low_stock_quantity')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="expire_at" class="form-label">@lang('translation.product.expire_at')</label>
                      <input type="date" class="form-control" autocomplete="new-expire-date" id="expire_at" name="expire_at" value="{{ old('expire_at') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.expire_at')])
                      </div>
                    </div>
                  </div>

                </div> <!-- end row -->

                <div class="mb-3">
                  <h5 class="font-size-14 mb-4">Product Has Box?</h5>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="is_box" id="box" value="true">
                    <label class="form-check-label" for="box">
                      Box
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_box" id="noBox" value="false">
                    <label class="form-check-label" for="noBox">
                      No Box
                    </label>
                  </div>
                </div>

                <div class="row" id="hasBox">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="box_quantity" class="form-label">@lang('translation.product.box_quantity')</label>
                      <input type="number" class="form-control" id="box_quantity" name="box_quantity" value="{{ old('box_quantity') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.box_quantity')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="box_price" class="form-label">@lang('translation.product.box_price')</label>
                      <input type="number" class="form-control calculate" id="box_price" name="box_price" value="{{ old('box_price') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.box_price')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="pcs_per_box" class="form-label">@lang('translation.product.pcs_per_box')</label>
                      <input type="number" class="form-control calculate" id="pcs_per_box" name="pcs_per_box" value="{{ old('pcs_per_box') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.pcs_per_box')])
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row" id="hasNoBox">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="price" class="form-label">@lang('translation.product.price')</label>
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.price')])
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="quantity" class="form-label">@lang('translation.product.quantity')</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.product.quantity')])
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              {{-- dropzone --}}
              <div class="col-4">
                <div class="mb-3" id="upload">
                  <label for="image" class="form-label h5 mb-3">@lang('translation.product.product_image')</label>
                  <div id="myDropzone" class="dropzone">
                    <div class="dz-message needsclick">
                      <div class="mb-3">
                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                      </div>

                      <h4>@lang('translation.drop_here')</h4>
                    </div>
                  </div>
                </div>
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
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>



  <script type="text/javascript">
    // Select2
    $(".select2").select2();

    // hide box detail and product price & quantity
    $("#hasBox").hide();

    $("#box").change(function() {
      if ($(this).is(":checked")) {
        //show box detail
        $("#hasBox").show();
        // make quantity readonly and calculate based on box quantity
        $('#quantity').attr("readonly", "readonly")
      }
    });

    $("#noBox").change(function() {
      if ($(this).is(":checked")) {
        //hide box detail
        $("#hasBox").hide();
        // make quantity editable
        $('#quantity').removeAttr("readonly")
      }
    });

    // calculate qunatity based on box quantity * pcs per box
    $(".calculate").on('keyup',function() {
      setQunatityValue()
    });

    const setQunatityValue = () => {
      let box_quantity = $("#box_quantity").val();
      let pcs_per_box = $("#pcs_per_box").val();
      let quantity = box_quantity * pcs_per_box;
      $("#quantity").val(quantity);
    }


    // Dropzone cofig
    // if it is inside document ready function, it will not work
    var uploadedDocumentMap = {}
    Dropzone.options.myDropzone = {
      url: "{{ route('storeTempFile') }}",
      maxFilesize: 10, // MB
      uploadMultiple: false,
      maxFiles: 1,
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function(file, response) {
        $('#upload').append('<input type="hidden" name="file" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function(file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('#upload').find('input[name="file"][value="' + name + '"]').remove()
      },
      init: function() {
        this.on("maxfilesexceeded", function(file) {
          Swal.fire({
            text: "{{ __('messages.max_files') }}",
            icon: "error"
          });
        });
      }
    }
  </script>
@endsection
