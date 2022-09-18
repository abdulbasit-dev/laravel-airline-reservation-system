@extends('layouts.master')

@section('title')
  @lang('translation.product.add_product')
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
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-6 border">
                 <img src="{{ getFile($product) }}" alt="" class="img-fluid d-block mx-auto rounded w-50">
            </div>
            <div class="col-xl-6">
              <div class="mt-xl-3 mt-4">
                <a href="javascript: void(0);" class="text-primary">{{ $product->category->name }}</a>
                <h4 class="mt-1 mb-3">{{ $product->name }}</h4>


                <h5 class="mb-4">Pcs Price : <b>{{ formatPrice($product->price) }}</b></h5>
                @if ($product->is_box)
                <h5 class="mb-4">Box Price : <b>{{ formatPrice($product->box_price) }}</b></h5>
                @endif
                <p class="text-muted mb-4">{{ $product->description }}</p>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div>
                      <p class="text-muted"><i class="bx bx-unlink font-size-16 text-primary me-1 align-middle"></i> Wireless</p>
                      <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 text-primary me-1 align-middle"></i> Wireless Range : 10m</p>
                      <p class="text-muted"><i class="bx bx-battery font-size-16 text-primary me-1 align-middle"></i> Battery life : 6hrs</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div>
                      <p class="text-muted"><i class="bx bx-user-voice font-size-16 text-primary me-1 align-middle"></i> Bass</p>
                      <p class="text-muted"><i class="bx bx-cog font-size-16 text-primary me-1 align-middle"></i> Warranty : 1 Year</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- end row -->

          <div class="mt-5">
            <h5 class="mb-3">Product Detail :</h5>

            <div class="table-responsive">
              <table class="table-bordered mb-0 table">
                <tbody>
                  <tr>
                    <th scope="row" style="width: 400px;">Category</th>
                    <td>{{ $product->category->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Supplier</th>
                    <td>{{ $product->supplier->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Added By</th>
                    <td>{{ $product->user->name?? "---" }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Barcode</th>
                    <td>{{  $product->barcode }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Created At</th>
                    <td>{{ $product->created_at }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Exprire At</th>
                    <td>{{ $product->expire_at }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Exprire Date Remain</th>
                    <td>{{ Carbon\Carbon::parse($product->expire_at)->diffForHumans() }}</td>
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
