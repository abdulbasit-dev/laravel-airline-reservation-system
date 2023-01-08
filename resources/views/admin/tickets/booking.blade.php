@extends('layouts.master')

@section('title')
  @lang('translation.flight.flight')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.flight.flight')
    @endslot
    @slot('li_2')
      {{ route('flights.index') }}
    @endslot
    @slot('title')
      @lang('translation.resource_list', ['resource' => __('attributes.flight')])
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3">
              <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">@lang('translation.flight.origin')</label>
                <select class="form-select select2 filter-input" id="origin" name="origin" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($cities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">@lang('translation.flight.destination')</label>
                <select class="form-select select2 filter-input" id="destination" name="destination" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($cities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label>@lang('translation.flight.airline')</label>
                <select class="form-select select2 filter-input" id="airline" name="airline" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($airlines as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label>@lang('translation.date_range')</label>
                <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                  <input type="text" class="form-control filter-input" id="departure" name="departure" placeholder="{{ __('translation.flight.departure') }}" onchange="dateChanged()" />
                  <input type="text" class="form-control filter-input" id="arrival" name="arrival" placeholder="{{ __('translation.flight.arrival') }}" onchange="dateChanged()" />
                </div>
              </div>
            </div>
          </div>

          <div>
            <button class="btn btn-primary w-sm" onclick="reset()">@lang('buttons.reset')</button>
          </div>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->


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
                <th> @lang('translation.flight.flight_number')</th>
                <th> @lang('translation.flight.route')</th>
                <th> @lang('translation.flight.time')</th>
                <th> @lang('translation.flight.seats')</th>
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
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
  {{-- bootstrap-datepicker --}}
  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


  {{-- datatable init --}}
  <script type="text/javascript">
    let table;

    //datepicker Init
    $("#datepicker").datepicker();

    function dateChanged() {
      table.draw();
    }

    function reset() {
      $('.filter-input').val('').trigger('change')
      table.draw();
    }

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
          url: "{{ route('tickets.flights') }}",
          method: "GET",
          data: function(d) {
            d.origin = $("#origin").find(":selected").val()
            d.destination = $("#destination").find(":selected").val();
            d.airline = $("#airline").find(":selected").val();
            d.departure = $("#departure").val();
            d.arrival = $("#arrival").val();
          }
        },
        columnDefs: [{
          className: "text-center",
          targets: 5
        }],
        columns: [{
            data: 'id'
          },
          {
            data: 'flight_info',
            name: "destination.name"
          },
          {
            data: 'route',
            searchable: false
          },
          {
            data: 'time',
            searchable: false
          },
          {
            data: 'capacity',
            searchable: false
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

  <script>
    $(document).on('click', '.book-btn', function(e) {
      e.preventDefault();
      const id = $(this).data('id');
      // send ajax request to the server
      $.ajax({
        url: "{{ route('tickets.book') }}",
        method: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          flight_id: id,
          seats: 1
        },
        success: function(data) {
          Swal.fire({
            timer: "1000",
            text: "{{ __('messages.booking_success') }}",
            icon: "success"
          })
          $('#datatable').DataTable().ajax.reload();
        },
        error: function(data) {
          if (data.responseJSON.status === 500) {
            Swal.fire({
              timer: "20000",
              title: data.responseJSON.message,
              text: data.responseJSON.errors,
              customClass: "swal-error",
              icon: "error",
            })
          }

          Swal.fire({
            timer: "2000",
            text: data.responseJSON.message,
            icon: "warning",
          });
        }

      })
    })
  </script>
@endsection
