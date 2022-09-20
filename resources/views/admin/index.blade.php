@extends('layouts.master')

@section('title')
  @lang('sidebar.dashboard')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      Dashboards
    @endslot
    @slot('title')
      Dashboard
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.total_orders')</p>
                  <h4 class="mb-0">{{ $data['totalOrder'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                    <span class="avatar-title">
                      <i class="bx bx-archive-in font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.canceled_orders')</p>
                  <h4 class="mb-0">{{ $data['totalCanceledOrder'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-archive-in font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">@lang('translation.dashboard.in_progress_orders')</p>
                    <h4 class="mb-0">{{ $data['totalInProgressOrder'] }}</h4>
                  </div>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-archive-in font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.delivered_orders')</p>
                  <h4 class="mb-0">{{ $data['totalDeliveredOrder'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-archive-in font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.sale_representvie')</p>
                  <h4 class="mb-0">{{ $data['totalSaleRepresentvie'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                    <span class="avatar-title">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.driver')</p>
                  <h4 class="mb-0">{{ $data['totalDriver'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.system_admin')</p>
                  <h4 class="mb-0">{{ $data['totalAdmin'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('translation.dashboard.warehouse_manager')</p>
                  <h4 class="mb-0">{{ $data['totalWarehouseManger'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->

  {{-- chart1 --}}
  {{-- <div class="row">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.orders_status_chart')</h4>
          <div class="row text-center">
            @forelse ($data['orderStatusChart'] as $order)
              <div class="col-2">
                <h5 class="mb-0">{{ $order['total'] }}</h5>
                <p class="text-muted text-truncate">{{ ucfirst($order['status']) }}</p>
              </div>
            @empty
              <div class="col-2">
                <p class="text-muted text-truncate">@lang('translation.no_data')</p>
              </div>
            @endforelse
          </div>
          <canvas id="orderStatusChart" height="260"></canvas>
        </div>
      </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.orders_payment_status_chart')</h4>
          <div class="row text-center">
            @forelse ($data['orderPaymentStatusChart'] as $order)
              <div class="col-2">
                <h5 class="mb-0">{{ $order['total'] }}</h5>
                <p class="text-muted text-truncate">{{ $order['is_paid'] ? __('translation.paid') : __('translation.due') }}</p>
              </div>
            @empty
              <div class="col-2">
                <p class="text-muted text-truncate">@lang('translation.no_data')</p>
              </div>
            @endforelse
          </div>
          <canvas id="orderPaymentStatusChart" height="260"></canvas>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row --> --}}

  {{-- last 5 orders --}}
  {{-- <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.latest_orders')</h4>
          <div class="table-responsive">
            <table class="table-nowrap mb-0 table align-middle">
              <thead class="table-light">
                <tr>
                  <th class="align-middle">@lang('translation.dashboard.order_id')</th>
                  <th class="align-middle">@lang('translation.dashboard.status')</th>
                  <th class="align-middle">@lang('translation.dashboard.client_name')</th>
                  <th class="align-middle">@lang('translation.dashboard.payment_status')</th>
                  <th class="align-middle">@lang('translation.dashboard.created_at')</th>
                  <th class="align-middle">@lang('translation.dashboard.order_by')</th>
                  <th class="align-middle">@lang('translation.dashboard.total_price')</th>
                  <th class="align-middle">@lang('translation.dashboard.view_details')</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data['lastOrders'] as $order)
                  <tr>
                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{ $order->id }}</a> </td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ ucfirst($order->client->name) }}</td>
                    <td>{!! $order->is_paid ? '<span class="badge badge-pill badge-soft-success font-size-11">' . __('translation.paid') . '</span>' : '<span class="badge badge-pill badge-soft-danger font-size-11">' . __('translation.due') . '</span>' !!}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('users.show', $order->user->id) }}">{{ $order->user->name }}</a></td>
                    <td>{{ formatPrice($order->total_price) }}</td>
                    <td>
    
                      <a href="{{ route('orders.show', $order->id) }}" type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                        @lang('buttons.view_details')
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="text-center">@lang('translation.emptyTable')</td>
                  </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <!-- end table-responsive -->
        </div>
      </div>
    </div>
  </div> --}}
  <!-- end row -->

  {{-- chart2  --}}
  {{-- <div class="row">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.monthly_expenses')</h4>
          @if ($data['expenseChart'])
            {!! $data['expenseChart']->renderHtml() !!}
          @else
            <h1>@lang('translation.no_data')</h1>
          @endif
        </div>
      </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.syetem_users_chart')</h4>
          <div class="row text-center">
            @forelse ($data['systemUserChart'] as $order)
              <div class="col-2">
                <h5 class="mb-0">{{ $order['total'] }}</h5>
                <p class="text-muted text-truncate">{{ $order['label'] }}</p>
              </div>
            @empty
              <div class="col-2">
                <p class="text-muted text-truncate">@lang('translation.no_data')</p>
              </div>
            @endforelse
          </div>
          <canvas id="systemUserChart" height="260"></canvas>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row --> --}}


  {{-- most 10 saled product --}}
  {{-- <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.most_saled_products')</h4>
          <div class="table-responsive">
            <table class="table-nowrap mb-0 table align-middle">
              <thead class="table-light">
                <tr>
                  <th class="align-middle">@lang('translation.resource_id', ['resource' => __('attributes.product')])</th>
                  <th class="align-middle">@lang('translation.product.name')</th>
                  <th class="align-middle">@lang('translation.product.product_image')</th>
                  <th class="align-middle">@lang('translation.product.category')</th>
                  <th class="align-middle">@lang('translation.product.supplier')</th>
                  <th class="align-middle">@lang('translation.product.barcode')</th>
                  <th class="align-middle">@lang('translation.product.num_of_sales')</th>
                  <th class="align-middle">@lang('translation.dashboard.view_details')</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data['mostSelledProduct'] as $product)
                  <tr>
                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{ $product->id }}</a> </td>
                    <td>{{ ucfirst($product->name) }}</td>
                    <td>
                      <a class="productImageLightBox" href="{{ getFile($product) }}">
                        <img alt="product image" src="{{ getFile($product) }}" class="img-thumbnai avatar-md">
                      </a>
                    </td>
                    <td>{{ ucfirst($product->category->name) }}</td>
                    <td>{{ ucfirst($product->supplier->name) }}</td>
                    <td>{{ ucfirst($product->barcode) }}</td>
                    <td><span class="badge badge-pill badge-soft-success font-size-11">{{ $product->num_of_sales }}</span></td>
                    <td>
                      <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                        @lang('buttons.view_details')
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="text-center">@lang('translation.emptyTable')</td>
                  </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <!-- end table-responsive -->
        </div>
      </div>
    </div>
  </div> --}}
  <!-- end row -->

@endsection
@section('script')
  <!-- Chart JS -->
  <script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

{{-- 
  @if ($data['expenseChart'])
    {!! $data['expenseChart']->renderJs() !!}
  @endif --}}

  {{-- <script>
    // light box init
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
    });

    // GET CHART DATA FROM BACKEND
    // ----------------------------------------------------
    // order status chart
    let orderStatusChart = @json($data['orderStatusChart']);
    let orderStatusLabel = [];
    let orderStatusData = [];
    let orderStatusColor = [];

    orderStatusChart.forEach(item => {
      orderStatusLabel.push(item.status);
      orderStatusData.push(item.total);
      orderStatusColor.push(item.color);
    });

    // order status chart
    let orderPaymentStatusChart = @json($data['orderPaymentStatusChart']);
    let orderPaymentStatusLabel = [];
    let orderPaymentStatusData = [];
    let orderPaymentStatusColor = [];

    orderPaymentStatusChart.forEach(item => {
      orderPaymentStatusLabel.push(item.label);
      orderPaymentStatusData.push(item.total);
      orderPaymentStatusColor.push(item.color);
    });

    // order status chart
    let systemUserChart = @json($data['systemUserChart']);
    let systemUserChartLabel = [];
    let systemUserChartData = [];
    let systemUserChartColor = [];

    systemUserChart.forEach(item => {
      systemUserChartLabel.push(item.label);
      systemUserChartData.push(item.total);
      systemUserChartColor.push(item.color);
    });

    ! function(l) {
      "use strict";

      function r() {}

      r.prototype.respChart = function(r, o, e, a) {
        Chart.defaults.global.defaultFontColor = "#8791af",
          Chart.defaults.scale.gridLines.color = "rgba(166, 176, 207, 0.1)";
        var t = r.get(0).getContext("2d"),
          n = l(r).parent();

        function i() {
          r.attr("width", l(n).width());

          switch (o) {
            case "Line":
              new Chart(t, {
                type: "line",
                data: e,
                options: a
              });
              break;

            case "Doughnut":
              new Chart(t, {
                type: "doughnut",
                data: e,
                options: a
              });
              break;

            case "Pie":
              new Chart(t, {
                type: "pie",
                data: e,
                options: a
              });
              break;

            case "Bar":
              new Chart(t, {
                type: "bar",
                data: e,
                options: a
              });
              break;
          }
        }

        l(window).resize(i), i();
      }, r.prototype.init = function() {
        // order payment chart
        this.respChart(l("#orderPaymentStatusChart"), "Doughnut", {
          labels: orderPaymentStatusLabel,
          datasets: [{
            data: orderPaymentStatusData,
            backgroundColor: orderPaymentStatusColor,
            hoverBackgroundColor: orderPaymentStatusColor,
            hoverBorderColor: "#fff"
          }]
        });
        // syetem user chart
        this.respChart(l("#systemUserChart"), "Doughnut", {
          labels: systemUserChartLabel,
          datasets: [{
            data: systemUserChartData,
            backgroundColor: systemUserChartColor,
            hoverBackgroundColor: systemUserChartColor,
            hoverBorderColor: "#fff"
          }]
        });
        // order status chart
        this.respChart(l("#orderStatusChart"), "Pie", {
          labels: orderStatusLabel,
          datasets: [{
            data: orderStatusData,
            backgroundColor: orderStatusColor,
            hoverBackgroundColor: orderStatusColor,
            hoverBorderColor: "#fff"
          }]
        });
      }, l.ChartJs = new r(), l.ChartJs.Constructor = r;
    }(window.jQuery),
    function() {
      "use strict";

      window.jQuery.ChartJs.init();
    }();
  </script> --}}
@endsection
