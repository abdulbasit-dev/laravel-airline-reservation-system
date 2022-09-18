@extends('layouts.master')

@section('title')
  @lang('translation.work_time.work_time')
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
      @lang('translation.work_time.work_time')
    @endslot
    @slot('li_2')
      {{ route('car-expenses.index') }}
    @endslot
    @slot('title')
      @lang('translation.work_time.user_report')
    @endslot
  @endcomponent



  {{-- user information --}}
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-between">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table-nowrap table-borderless mb-0 table">
                  <tbody>
                    <tr>
                      <th scope="row">@lang('translation.user.name') :</th>
                      <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.phone') :</th>
                      <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.phone_alt') :</th>
                      <td>{{ $user->phone_alt ?? '---' }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.email') :</th>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.address') :</th>
                      <td>{{ $user->address ?? '---' }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-start mb-4">
            <div class="m-4">
              <label>@lang('translation.date_range')</label>
              <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                <input type="text" class="form-control" id="start" name="startDate" placeholder="Start Date" onchange="dateChanged()" />
                <input type="text" class="form-control" id="end" name="endDate" placeholder="End Date" onchange="dateChanged()" />
              </div>
            </div>
<div class="m-4">
  <label>@lang('translation.work_time.total')</label>
  <span id="total_time">
  </span>
</div>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.work_time.date')</th>
                <th> @lang('translation.work_time.start_time')</th>
                <th> @lang('translation.work_time.end_time')</th>
                <th> @lang('translation.work_time.total')</th>
                <th> @lang('translation.action')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  {{-- user work chart --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @if ($chart)
            <h3>{!! $chart->options['chart_title'] !!}</h3>
            {!! $chart->renderHtml() !!}
          @else
            <h1>@lang('translation.no_data')</h1>
          @endif
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
  <div class="modal fade" id="mapView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">@lang('translation.work_time.view_on_map')</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="leaflet-map-marker" class="leaflet-map" width='100'></div>
                <br>
                <h5><b id="distance"></b></h5>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
  </div>

@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>
  
  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>


  @if ($chart)
    {!! $chart->renderJs() !!}
  @endif

  {{-- datatable init --}}
  <script type="text/javascript">
    let table;
    function dateChanged() {
      table.draw();
      let sum = table.column(4,{ page: 'current' }).data().sum();
      $("#total_time").text(sum);
    }
    $.fn.dataTable.Api.register('column().data().sum()', function () {
    return this.reduce(function (a, b) {
        prodhrdArr = a.split(":");
        conprodArr = b.split(":");
        var hh1 = parseInt(prodhrdArr[0]) + parseInt(conprodArr[0]);
        var mm1 = parseInt(prodhrdArr[1]) + parseInt(conprodArr[1]);
        var ss1 = parseInt(prodhrdArr[2]) + parseInt(conprodArr[2]);

        if (ss1 > 59) {
            var ss2 = ss1 % 60;
            var ssx = ss1 / 60;
            var ss3 = parseInt(ssx);//add into min
            var mm1 = parseInt(mm1) + parseInt(ss3);
            var ss1 = ss2;
        }
        if (mm1 > 59) {
            var mm2 = mm1 % 60;
            var mmx = mm1 / 60;
            var mm3 = parseInt(mmx);//add into hour
            var hh1 = parseInt(hh1) + parseInt(mm3);
            var mm1 = mm2;
        }
        var finaladd = hh1 + ':' + mm1 + ':' + ss1;
        return finaladd;
    });
});

    $(function() {
      table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        order: [
          [2, "desc"]
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
          url: "{{ route('work-times.user-report', $user->id) }}",
          method: "GET",
          data: function(d) {
            d.startDate = $("#start").val();
            d.endDate = $("#end").val();
          }
        },
        columns: [{
            data: 'id'
          },
          {
            data: 'created_at'
          },
          {
            data: 'start_time'
          },
          {
            data: 'end_time'
          },
          {
            data: 'total_time'
          },
          {
            data: 'action'
          },
        ],
        "drawCallback": function( settings ) {
        let sum = table.column(4).data().sum();
      $("#total_time").text(sum);
    }
      })
      //init buttons
      new $.fn.dataTable.Buttons(table, {
        buttons: [{
          extend: 'colvis',
          text: "@lang('translation.colvisBtn')"
        }]
      });

      //add buttons to action_btns
      table.buttons().container()
        .prependTo($('#action_btns'));

      // select dropdown for change the page length
      $('.dataTables_length select').addClass('form-select form-select-sm');

      // add margin top to the pagination and info 
      $('.dataTables_info, .dataTables_paginate').addClass('mt-3');

         //datepicker Init
         $("#datepicker").datepicker();
         console.log(table.column(0,{ page: 'current' }).data().sum());
    });
    // alert('Column sum is: ' + table.column(0,{ page: 'current' }).data().sum());
    let exampleModal = document.getElementById('mapView');

    let markermap;

    exampleModal.addEventListener('show.bs.modal', function (event) {
      if(markermap != undefined){
        markermap.off();
        markermap.remove();
      }
      // Button that triggered the modal
    let button = event.relatedTarget
    
    start_lat= button.getAttribute('data-start-lat');
    start_long= button.getAttribute('data-start-long');

    end_lat= button.getAttribute('data-end-lat');
    end_long= button.getAttribute('data-end-long');
    // Update the modal's content.
    markermap = L.map("leaflet-map-marker",{ 
    center: [start_lat,start_long], 
    zoom: 10});
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 120,
    minZoom: 1,
  }).addTo(markermap);


    let start = L.marker([start_lat,start_long]).bindPopup('@lang('translation.work_time.start_location')').addTo(markermap)
    let end = L.marker([end_lat,end_long]).bindPopup('@lang('translation.work_time.end_location')').addTo(markermap)
    end._icon.classList.add("huechange");
    // markermap.fitBounds([
    //   [start.getLatLng(), end.getLatLng()]
    // ]);
    markermap.flyTo(end.getLatLng());

    $("#distance").text(start.getLatLng().distanceTo(end.getLatLng()).toFixed(2) + ' @lang('translation.order.meters_away')');
    
  });
  </script>
@endsection
