@extends('layouts.master')

@section('title')
  @lang('translation.product.product_info')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
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
      @lang('translation.product.product_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-between">
            <div class="col-xl-6">
              <a class="productImageLightBox" href="{{ getFile($product) }}">
                <img alt="product image" src="{{ getFile($product) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto">
              </a>
            </div>
            <div class="col-xl-6">
              <div class="float-end dropdown ms-2">
                <a class="text-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-dots-horizontal font-size-18"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="javascript:void(0)">@lang('translation.actions')</a>
                  <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">@lang('translation.edit_resource', ['resource' => __('attributes.product')])</a>
                  <a class="dropdown-item" href="javascript:void(0)" onclick="submitDeleteForm('productShowDeleteForm_{{ $product->id }}')"> @lang('translation.delete_resource', ['resource' => __('attributes.product')])</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="productShowDeleteForm_{{ $product->id }}">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </div>
              <div class="mt-xl-3 mt-4">
                <a href="javascript: void(0);" class="text-primary">{{ $product->category->name }}</a>
                <h4 class="mt-1 mb-3">{{ $product->name }}</h4>



                @if ($product->is_box)
                  <h5 class="mb-4">@lang('translation.product.piece_price') : <b>{{ formatPrice($product->price) }}</b></h5>
                  <h5 class="mb-4">@lang('translation.product.box_price') : <b>{{ formatPrice($product->box_price) }}</b></h5>
                @else
                  <h5 class="mb-4">@lang('translation.product.price') : <b>{{ formatPrice($product->price) }}</b></h5>
                @endif
                <p class="text-muted mb-4">{{ $product->description }}</p>

              </div>

            </div>
          </div>
          <!-- end row -->

          <div class="mt-5">
            <h5 class="mb-3">@lang('translation.product.product_info'):</h5>

            <div class="table-responsive">
              <table class="table-borderless mb-0 table">
                <tbody>
                  <tr>
                    <th scope="row" style="width: 400px;">@lang('translation.product.category')</th>
                    <td>{{ $product->category->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.supplier')</th>
                    <td>{{ $product->supplier->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.added_by')</th>
                    <td>{{ $product->user->name ?? '---' }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.barcode')</th>
                    <td>{{ $product->barcode }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.quantity')</th>
                    <td>{{ $product->quantity }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.purchase_price')</th>
                    <td>{{ formatPrice($product->purchase_price) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.low_stock_quantity')</th>
                    <td>{{ $product->low_stock_quantity ?? '---' }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.product.has_box')</th>
                    <td>{!! $product->is_box ? '<span class="badge badge-pill badge-soft-success font-size-12">' . __('translation.yes') . '</span>' : '<span class="badge badge-pill badge-soft-danger font-size-12">' . __('translation.no') . '</span>' !!}</td>
                  </tr>
                  @if ($product->is_box)
                    <tr>
                      <th scope="row">@lang('translation.product.pcs_per_box')</th>
                      <td>{{ $product->pcs_per_box }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.product.box_quantity')</th>
                      <td>{{ $product->box_quantity }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.product.purchase_box_price')</th>
                      <td>{{ $product->purchase_box_price ?? '---' }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.product.box_low_stock_quantity')</th>
                      <td>{{ $product->box_low_stock_quantity }}</td>
                    </tr>
                  @endif

                  <tr>
                    <th scope="row">@lang('translation.product.num_of_sales')</th>
                    <td>{{ $product->num_of_sales }}</td>
                  </tr>
                  <tr>
                    <th scope="row">@lang('translation.created_at')</th>
                    <td>{{ formatDate($product->created_at) }}</td>
                  </tr>

                  <tr>
                    <th scope="row">@lang('translation.product.expire_at')</th>
                    @if ($diff <= $preExpireWarining && $diff > 0)
                      <td><span class="badge badge-pill badge-soft-warning font-size-12">{{ $product->expire_at }}</span></td>
                    @elseif ($diff <= 0)
                      <td><span class="badge badge-pill badge-soft-danger font-size-12">{{ $product->expire_at }}</span></td>
                    @else
                      <td><span class="badge badge-pill badge-soft-success font-size-12">{{ $product->expire_at }}</span></td>
                    @endif
                  </tr>


                  <tr>
                    <th scope="row">@lang('translation.product.expire_remain')</th>
                    @if ($diff <= $preExpireWarining && $diff > 0)
                      <td><span class="badge badge-pill badge-soft-warning font-size-12">{{ $diff  }} @lang('translation.product.expire_day_remain')</span></td>
                    @elseif ($diff <= 0)
                      <td> <span class="badge badge-pill badge-soft-danger font-size-12">{{ abs($diff) }} @lang('translation.product.expired_day')</span></td>
                    @else
                        <td> <span class="badge badge-pill badge-soft-success font-size-12">{{ $diff }} @lang('translation.product.expire_day_remain')</span></td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- end Specifications -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->
@endsection
@section('script')
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

  <script>
    // lightbox init
    $(".productImageLightBox").magnificPopup({
      type: "image",
      closeOnContentClick: !0,
      closeBtnInside: !1,
      fixedContentPos: !0,
      mainClass: "mfp-no-margins mfp-with-zoom",
      image: {
        verticalFit: !0
      },
      zoom: {
        enabled: !0,
        duration: 300
      }
    })
  </script>
@endsection
