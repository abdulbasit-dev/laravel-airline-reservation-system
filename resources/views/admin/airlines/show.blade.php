@extends('layouts.master')

@section('title')
  @lang('translation.resource_info', ['resource' => __('attributes.airline')])
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.airline.airline')
    @endslot
    @slot('li_2')
      {{ route('airlines.index') }}
    @endslot
    @slot('title')
      @lang('translation.resource_info', ['resource' => __('attributes.airline')])
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-xl-6">
              <div class="mt-5">
                <div class="table-responsive">
                  <table class="table-borderless mb-0 table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.airline.name')</th>
                        <td>{{ $airline->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.car.code')</th>
                        <td>{{ $airline->code }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">@lang('translation.airline.no_of_planes')</th>
                        <td>
                          <span class="badge badge-pill badge-soft-info font-size-14">{{ $airline->planes()->count() }}</span>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- end Specifications -->
            <div class="col-xl-6">
              <a class="airlineImageLightBox" href="{{ getFile($airline) }}">
                <img alt="car expense image" src="{{ getFile($airline) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto">
              </a>
            </div>

          </div>
          <!-- end row -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->

  {{-- show airline planes --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-4" id="action_btns">
          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.plane.name')</th>
                <th> @lang('translation.plane.airline')</th>
                <th> @lang('translation.plane.code')</th>
                <th> @lang('translation.plane.capacity')</th>
                <th> @lang('translation.created_at')</th>
                <th> @lang('translation.actions')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection
@section('script')
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

  <script>
    // magnific-popup
    $(".airlineImageLightBox").magnificPopup({
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

  {{-- datatable init --}}
  <script type="text/javascript">
    $(function() {
      let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        order: [
          [3, "desc"]
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
        ajax: "{{ route('airlines.show', $airline->id) }}",

        columns: [{
            data: 'id'
          },
          {
            data: 'name'
          },
          {
            data: 'name'
          },
          {
            data: 'code'
          },
          {
            data: 'capacity'
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

      //init buttons
      new $.fn.dataTable.Buttons(table, {
        buttons: [{
          extend: 'colvis',
          text: "@lang('translation.colvisBtn')"
        }]
      });

      // select dropdown for change the page length
      $('.dataTables_length select').addClass('form-select form-select-sm');

      // add margin top to the pagination and info 
      $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
    });
  </script>
@endsection
