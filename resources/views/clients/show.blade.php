@extends('layouts.master')

@section('title')
  @lang('translation.client.client')
@endsection

@section('css')
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.client.client')
    @endslot
    @slot('li_2')
      {{ route('clients.index') }}
    @endslot
    @slot('title')
      @lang('translation.client.client_info')
    @endslot
  @endcomponent

  <div class="row">
    {{-- client information --}}
    <div class="col-md-6" >
      <div class="card">
        <div class="card-body border-bottom">
          <div class="float-end dropdown ms-2">
            <a class="text-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-horizontal font-size-18"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="javascript:void(0)">@lang('translation.actions')</a>
              <a class="dropdown-item" href="{{ route('cars.edit', $client->id) }}">@lang('translation.edit_resource', ['resource' => __('attributes.car')])</a>
              <a class="dropdown-item" href="javascript:void(0)" onclick="submitDeleteForm('carShowDeletForm_{{ $client->id }}')"> @lang('translation.delete_resource', ['resource' => __('attributes.car')])</a>
              <form action="{{ route('cars.destroy', $client->id) }}" method="POST" id="carShowDeletForm_{{ $client->id }}">
                @csrf
                @method('DELETE')
              </form>
            </div>
          </div>
          <h5 class="mb-3">@lang('translation.client.client_info')</h5>
          <div class="table-responsive">
            <table class="table-borderless mb-0 table">
              <tbody>
                <tr>
                  <th scope="row" style="width: 400px;">#@lang('translation.resource_id', ['resource' => __('attributes.client')])</th>
                  <td>{{ $client->id }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.name')</th>
                  <td>{{ $client->name }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.category')</th>
                  <td class="text-primary">{{ $client->category->name }}</td>
                </tr>
                @if ($client->zone_id)
                  <tr>
                    <th scope="row" style="width: 400px;">@lang('translation.client.zone')</th>
                    <td >{{ $client->zone->name }}</td>
                  </tr>
                @endif
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.phone')</th>
                  <td>{{ $client->phone }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.phone_alt')</th>
                  <td>{{ $client->phone_alt ?? '---' }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.address')</th>
                  <td>{{ $client->address }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.no_orders')</th>
                  <td><span class="badge badge-pill badge-soft-info font-size-14">{{ $client->orders_count }}</span></td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.loan_limit')</th>
                  <td><span class="badge badge-pill badge-soft-warning font-size-14">{{ $client->loan_limit }}</span></td>
                </tr>
                <tr>
                  <th scope="row" style="width: 400px;">@lang('translation.client.loan_count')</th>
                  <td><span class="badge badge-pill badge-soft-{{ $client->loan_count ? 'danger' : 'success' }} font-size-14">{{ $client->loan_count }}</span></td>
                </tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- map --}}
    <div class="col-md-6" >
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.client.address_on_map')</h4>
          <div id="leaflet-map-marker" class="leaflet-map"></div>
        </div>
      </div>
    </div>
  </div> <!-- end row -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">@lang('translation.client.client_orders')</h5>
          <table id="datatable" class="table-hover table-bordered w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.order.client_name')</th>
                <th> @lang('translation.order.order_by')</th>
                <th> @lang('translation.order.total')</th>
                <th> @lang('translation.order.discount')</th>
                <th> @lang('translation.order.order_status')</th>
                <th> @lang('translation.order.delivery_date')</th>
                <th> @lang('translation.created_at')</th>
                <th> @lang('translation.actions')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>


      </div>
    </div>
  </div> <!-- end row -->
@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>

  <script type="text/javascript">
    // {{-- leaflet init --}}
    const clientLat = "{{ $client->lat }}";
    const clientLong = "{{ $client->long }}";
    var markermap = L.map("leaflet-map-marker").setView([clientLat, clientLong, -.09], 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1
      }).addTo(markermap),
      L.marker([clientLat, clientLong, -.09]).addTo(markermap)

    // {{-- datatable init --}}
    $(function() {
      table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        order: [
          [7, "desc"]
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
        },
        ajax: {
          url: "{{ route('orders.index') }}",
          method: "GET",
          data: function(d) {
            d.client = "{{ $client->id }}";
          }
        },
        columns: [{
            data: 'id'
          },
          {
            data: 'client.name',
          },
          {
            data: 'user.name',
          },
          {
            data: 'total_price',
          },
          {
            data: 'discount_amount',
          },
          {
            data: 'status',
          },
          {
            data: 'arrive_at',
          },
          {
            data: 'created_at',
          },
          {
            data: 'action',
            orderable: false,
            searchable: false
          },
        ],
      })


      // select dropdown for change the page length
      $('.dataTables_length select').addClass('form-select form-select-sm');

      // add margin top to the pagination and info 
      $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
    });
  </script>
@endsection
