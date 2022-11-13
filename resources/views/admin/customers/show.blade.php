@extends('layouts.master')

@section('title')
  @lang('translation.resource_info', ['resource' => __('attributes.customer')])
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
      Customer
    @endslot
    @slot('li_2')
      {{ route('customers.index') }}
    @endslot
    @slot('title')
      @lang('translation.resource_info', ['resource' => __('attributes.customer')])
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
                        <th scope="row" style="width: 400px;">Name</th>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Email</th>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Phone</th>
                        <td>{{ $user->phone }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Address</th>
                        <td>{{ $user->address }}</td>
                      </tr>

                      <tr>
                        <th scope="row" style="width: 400px;">No Of Tickets</th>
                        <td>
                          <span class="badge badge-pill badge-soft-info font-size-14">{{ $user->tickets()->count() }}</span>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->

  {{-- show  user tickets --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5>User Tickets</h5>
          <div class="d-flex justify-content-end mb-4" id="action_btns">
          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.flight.flight_number')</th>
                <th> @lang('translation.flight.origin')</th>
                <th> @lang('translation.flight.time')</th>
                <th> Status</th>
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
      table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        order: [
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
        },
        ajax: {
          url: "{{ route('customers.show', $user->id) }}",
          method: "GET",
        },
        columnDefs: [{
          className: "text-center",
          targets: 5
        }],
        columns: [{
            data: 'id'
          },
          {
            data: 'flight_info'
          },
          {
            data: 'route'
          },
          {
            data: 'time'
          },
          {
            data: 'status'
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
