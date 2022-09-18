@extends('layouts.master')

@section('title')
  @lang('translation.order.order_info')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
  <style>
    img.huechange {
      filter: hue-rotate(120deg);
    }
  </style>
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.order.order')
    @endslot
    @slot('li_2')
      {{ route('orders.index') }}
    @endslot
    @slot('title')
      @lang('translation.order.order_info')
    @endslot
  @endcomponent

  {{-- order detail info --}}
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="invoice-title">
            <h4 class="float-end font-size-16">@lang('translation.order.order') # {{ $order->id }}</h4>
            <div class="mb-4">
              <h5>@lang('translation.order.status'): <span class="text-{{ orderClass($order->status) }} text-capitalize" id="orderStatus">{{ $order->status }}</span></h5>
              <h5>@lang('translation.order.payment_status'): <span class="text-{{ $order->is_paid ? 'success' : 'warning' }} text-capitalize" id="orderStatus">{{ $order->is_paid ? __('translation.paid') : __('translation.due') }}</span></h5>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              <address>
                <strong>@lang('translation.order.billed_to'):</strong><br>
                {{ $order->client->name }}<br>
                {{ $order->client->category->name }}<br>
                {{ $order->client->address }}<br>
                {{ $order->client->phone ? $order->client->phone : $order->client->phone_alt }}<br>
              </address>
            </div>
            <div class="col-sm-6 text-sm-end">
              <address class="mt-sm-0 mt-2">
                <strong>@lang('translation.order.order_by'):</strong><br>
                {{ $order->user->name }}<br>
                {{ $order->user->email }}<br>
                {{ $order->user->phone ? $order->user->phone : $order->user->phone_alt }}<br>
                {{ $order->user->address }}<br>
              </address>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 mt-3">
              <address>
                <strong>@lang('translation.order.order_date'):</strong><br>
                {{ $order->created_at }}<br><br>
              </address>

            </div>
            <div class="col-sm-6 text-sm-end mt-3">
              <address>
                <strong>@lang('translation.order.delivery_date'):</strong><br>
                {{ formatDateWithTimezone($order->arrive_at) }}<br><br>
              </address>

            </div>
          </div>
          <div class="mt-3 py-2">
            <h3 class="font-size-15 fw-bold">@lang('translation.order.order_detail')</h3>
          </div>
          <div class="table-responsive">
            <table class="table-nowrap table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>@lang('translation.order.item')</th>
                  <th>@lang('translation.order.price')</th>
                  <th>@lang('translation.order.type')</th>
                  <th>@lang('translation.order.quantity')</th>
                  <th>@lang('translation.order.free_quantity')</th>
                  <th class="text-end">@lang('translation.order.total')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order->orderDetails as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ formatPrice($item->product_price) }}</td>
                    <td>{{ $item->type ? __('translation.box') : __('translation.pc') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->free ?? '---' }}</td>
                    <td class="text-end">{{ formatPrice($item->total_price) }}</td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="6" class="text-end"><strong>@lang('translation.order.sub_total')</strong></td>
                  <td class="text-end"><strong>{{ formatPrice($order->total_price + $order->discount_amount) }}</strong></td>
                </tr>
                <tr>
                  <td colspan="6" class="text-end border-0">
                    <strong>@lang('translation.order.discount')</strong>
                  </td>
                  <td class="text-end border-0"><strong>{{ formatPrice($order->discount_amount) }}</strong></td>
                </tr>
                <tr>
                  <td colspan="6" class="text-end border-0">
                    <strong>@lang('translation.order.total')</strong>
                  </td>
                  <td class="text-end border-0">
                    <h4 class="m-0">{{ formatPrice($order->total_price) }}</h4>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-print-none">
            @if ($order->note)
              <div class="float-start">
                <h5>@lang('translation.order.note')</h5>
                <p>{{ $order->note }}</p>
              </div>
            @endif
          </div>

          <div class="float-end">
            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
            @if ($order->status !== 'delivered')
              <button class="btn btn-primary w-md waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#changeStatus">@lang('translation.order.accept/cancel')</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- end row -->

  {{-- change order status model --}}
  <div>
    <!-- sample modal content -->
    <div id="changeStatus" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">@lang('translation.order.change_status')</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="mt-4">
              <div class="form-check form-radio-outline form-radio-success mb-3">
                <input class="form-check-input" type="radio" name="orderStatus" value="accepted" id="accept" checked="">
                <label class="form-check-label" for="accept">
                  @lang('translation.accept')
                </label>
              </div>
              <div class="form-check form-radio-outline form-radio-danger">
                <input class="form-check-input" type="radio" name="orderStatus" value="canceled" id="cancel">
                <label class="form-check-label" for="cancel">
                  @lang('translation.cancel')
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">@lang('buttons.close')</button>
            <button type="click" class="btn btn-primary waves-effect waves-light" id="changeStatusBtn">@lang('buttons.submit')</button>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div> <!-- end preview-->

  {{-- order timeline --}}
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5">@lang('translation.order.order_timeline')</h4>
          <div class="">
            <ul class="verti-timeline list-unstyled">

              {{-- ordered --}}
              <li class="event-list">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle text-success"></i>
                </div>
                <div class="d-flex">
                  <div class="me-3 flex-shrink-0">
                    <i class="bx bx-package h2 text-success"></i>
                  </div>
                  <div class="flex-grow-1">
                    <div>
                      <h5>@lang('translation.order.ordered')</h5>
                      <p class="text-muted">@lang('translation.order.order_by') <span class="text-primary">{{ $order->user->name }}</span>, @lang('translation.order.order_at') <span class="text-primary">{{ formatDate($order->created_at) }}</span></p>
                    </div>
                  </div>
                </div>
              </li>

              {{-- accpeted/canceled --}}
              <li class="event-list {{ $order->status == 'accepted' || $order->status == 'canceled' ? 'active' : '' }}">
                <div class="event-timeline-dot">
                  <i
                    class="bx bx-right-arrow-circle {{ $order->status == 'accepted' || $order->status == 'canceled' ? 'bx-fade-right' : '' }} {{ $order->status == 'assigned' || $order->status == 'pickedup' || $order->status == 'delivered' ? 'text-success' : '' }}"></i>
                </div>
                <div class="d-flex">
                  <div class="me-3 flex-shrink-0">
                    <i
                      class="{{ $order->status == 'assigned' || $order->status == 'pickedup' || $order->status == 'delivered' ? 'text-success' : 'text-primary' }} bx @if ($order->is_accepted) bx-calendar-check @else bx-calendar-x text-danger @endif h2"></i>
                  </div>
                  <div class="flex-grow-1">
                    <div>
                      <h5 class="text-capitalize">{{ $order->is_canceled ? __('translation.order.cancelled') : __('translation.order.accepted') }}</h5>
                      @if ($order->is_canceled)
                        <p class="text-muted">@lang('translation.order.cancelled_by') <span class="text-danger">{{ $order->canceller->name }}</span>, @lang('translation.order.cancelled_at') <span class="text-danger">{{ formatDate($order->canceled_at) }}</span></p>
                      @else
                        <p class="text-muted">@lang('translation.order.accepted_by') <span class="text-primary">{{ $order->admin->name }}</span>, @lang('translation.order.accepted_at') <span class="text-primary">{{ formatDate($order->accepted_at) }}</span></p>
                      @endif
                    </div>
                  </div>
                </div>
              </li>

              {{-- assign --}}
              <li class="event-list {{ $order->status == 'assigned' ? 'active' : '' }}">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle {{ $order->status == 'assigned' ? 'bx-fade-right' : '' }} {{ $order->status == 'pickedup' || $order->status == 'delivered' ? 'text-success' : '' }}"></i>
                </div>
                <div class="d-flex">
                  <div class="me-3 flex-shrink-0">
                    <i class="bx bx-archive-out h2 {{ $order->status == 'pickedup' || $order->status == 'delivered' ? 'text-success' : 'text-primary' }}"></i>
                  </div>
                  <div class="flex-grow-1">
                    <div>
                      <h5>@lang('translation.order.assigned')</h5>
                      @if ($order->is_assigned)
                        <p class="text-muted">@lang('translation.order.assigned_by') <span class="text-primary">{{ $order->assigner->name }}</span>, @lang('translation.order.assigned_to') <span class="text-primary">{{ $order->driver->name }}</span>, @lang('translation.order.assigned_at') <span
                            class="text-primary">{{ formatDate($order->assigned_at) }}</span></p>
                      @endif
                    </div>
                  </div>
                </div>
              </li>


              {{-- picked up --}}
              <li class="event-list {{ $order->status == 'pickedup' ? 'active' : '' }}">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle {{ $order->status == 'pickedup' ? 'bx-fade-right' : '' }} {{ $order->status == 'delivered' ? 'text-success' : '' }}"></i>
                </div>
                <div class="d-flex">
                  <div class="me-3 flex-shrink-0">
                    <i class="bx bx-car h2 {{ $order->status == 'delivered' ? 'text-success' : 'text-primary' }}"></i>
                  </div>
                  <div class="flex-grow-1">
                    <div>
                      <h5>@lang('translation.order.pickedup')</h5>
                      @if ($order->is_pickedup)
                        <p class="text-muted">@lang('translation.order.pickedup_by') <span class="text-primary">{{ $order->driver->name }}</span>, @lang('translation.order.pickedup_at') <span class="text-primary">{{ formatDate($order->pickedup_at) }}</span></p>
                      @endif
                    </div>
                  </div>
                </div>
              </li>

              {{-- delivered --}}
              <li class="event-list">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle {{ $order->status == 'delivered' ? 'text-success' : '' }}"></i>
                </div>
                <div class="d-flex">
                  <div class="me-3 flex-shrink-0">
                    <i class="bx bx-task h2 {{ $order->status == 'delivered' ? 'text-success' : 'text-primary' }}"></i>
                  </div>
                  <div class="flex-grow-1">
                    <div>
                      <h5>@lang('translation.order.delivered')</h5>
                      @if ($order->is_delivered)
                        <p class="text-muted">@lang('translation.order.delivered_at') <span class="text-primary">{{ formatDate($order->delivered_at) }}</span></p>
                      @endif
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5">@lang('translation.order.payment_history')</h4>
          <table id="datatable" class="table" width="100%">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.payment.order')</th>
                <th> @lang('translation.payment.client')</th>
                <th> @lang('translation.payment.paid')</th>
                <th> @lang('translation.payment.due')</th>
                <th> @lang('translation.payment.is_paid')</th>
              </tr>
            </thead>
            <tbody>
              @if ($order->payment)
                @forelse ($order->payment->history as $history)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->client->name }}</td>
                    <td>{{ formatPrice($order->payment->paid) }}</td>
                    <td>{{ formatPrice($order->payment->due) }}</td>
                    <td>{!! $order->payment->is_paid ? '<span class="badge badge-pill badge-soft-success font-size-14">' . __('translation.paid') . '</span>' : '<span class="badge badge-pill badge-soft-warning font-size-14">' . __('translation.due') . '</span>' !!}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="text-center">@lang('translation.emptyTable')</td>
                  </tr>
                @endforelse
              @else
                <tr>
                  <td colspan="10" class="text-center">@lang('translation.emptyTable')</td>
                </tr>
              @endif

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.visit.address_on_map')</h4>
          <div id="leaflet-map-marker" class="leaflet-map" width='100'></div>
          <br>
          <h5><b id="distance"></b></h5>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>

  <script>
    $(function() {
      $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        payment: [
          [0, "desc"]
        ],
        // text transalations
        language: {
          search: "@lang('translation.search')",
          lengthMenu: "@lang('translation.lengthMenu1') _MENU_ @lang('translation.lengthMenu2')",
          processing: "@lang('translation.processing')",
          info: "@lang('translation.infoShowing') _START_ @lang('translation.infoTo') _END_ @lang('translation.infoOf') _TOTAL_ @lang('translation.infoEntries')",
          emptyTable: "@lang('translation.emptyTable')",
          paginate: {
            "first": "@lang('translation.paginateFirst')",
            "last": "@lang('translation.paginateLast')",
            "next": "@lang('translation.paginateNext')",
            "previous": "@lang('translation.paginatePrevious')"
          },
        }
      });
    });
    //map init
    const visitLat = "{{ $order->lat }}";
    const visitLong = "{{ $order->long }}";
    const clientLat = "{{ $order->client->lat }}";
    const clientLong = "{{ $order->client->long }}";
    var markermap = L.map("leaflet-map-marker").setView([visitLat, visitLong, -.09], 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
      maxZoom: 20,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1
    }).addTo(markermap);

    let visit = L.marker([visitLat, visitLong, -.09]).bindPopup('@lang('translation.order.order_location')').addTo(markermap)
    let client = L.marker([clientLat, clientLong, -.09]).bindPopup('@lang('translation.order.client_location')').addTo(markermap)
    client._icon.classList.add("huechange");
    markermap.fitBounds([
      [visit.getLatLng(), client.getLatLng()]
    ]);
    $("#distance").text(visit.getLatLng().distanceTo(client.getLatLng()).toFixed(2) + ' @lang('translation.order.meters_away')');
  </script>

  <script>
    $("#changeStatusBtn").on('click', function(e) {
      const status = document.querySelector('input[name="orderStatus"]:checked').value;

      $.ajax({
        type: "POST",
        url: "{{ route('orders.statusChange', $order->id) }}",
        data: {
          status,
          _token: '{{ csrf_token() }}'
        },
        success: function(data) {
          if (status === 'accepted') {
            Swal.fire({
              timer: "2000",
              text: `{{ __('messages.order.accepted') }}`,
              icon: "success"
            })

          } else {
            Swal.fire({
              timer: "2000",
              text: `{{ __('messages.order.canceled') }}`,
              icon: "success"
            })
          }

          $.ajax({
            type: "GET",
            url: "{{ route('orders.getStatus', $order->id) }}",
            success: function(data) {
              // change the status
              document.getElementById('orderStatus').innerText = data;
              if (data === 'accepted') {
                document.getElementById('orderStatus').className = 'text-success text-capitalize';
              } else {
                document.getElementById('orderStatus').className = 'text-danger text-capitalize';
              }
            }
          });

          // close modal 
          $('#changeStatus').modal('toggle');
        },
        error: function(data) {
          Swal.fire({
            timer: "20000",
            title: `{{ __('api.internal_server_error') }}`,
            text: data.responseJSON.message,
            customClass: "swal-error",
            icon: "error",
          })
          $('#changeStatus').modal('toggle');
        }
      });
    })
  </script>
@endsection
