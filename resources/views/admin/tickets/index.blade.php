@extends('layouts.master')

@section('title')
  @lang('translation.ticket.ticket')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.ticket.ticket')
    @endslot
    @slot('li_2')
      {{ route('tickets.index') }}
    @endslot
    @slot('title')
      {{-- showing the title according to the status of match --}}
      @switch(request()->get('status'))
        @case('pending')
          Pending Tickets
        @break

        @case('approved')
          Approved Tickets
        @break

        @case('canceled')
          Canceled Tickets
        @break

        @default
          All Tickets
      @endswitch
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
            <button class="btn btn-light w-sm" onclick="reset()">@lang('buttons.reset')</button>
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
                <th>Customer Name</th>
                <th> @lang('translation.flight.flight_number')</th>
                <th>Route</th>
                <th>Time</th>
                <th>Seat Number</th>
                <th>Status</th>
                <th> @lang('translation.actions')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <div class="modal fade" id="chanegStatusModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <form method="POST" class="w-100" id="chanegStatusForm" action="">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Ticket Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @csrf
                    <div class="mt-4">
                      <div class="form-check form-radio-outline form-radio-success mb-3">
                        <input class="form-check-input" type="radio" name="status" value="approve" id="accept" checked="">
                        <label class="form-check-label" for="accept">
                          Approve
                        </label>
                      </div>
                      <div class="form-check form-radio-outline form-radio-danger">
                        <input class="form-check-input" type="radio" name="status" value="canceled" id="cancel">
                        <label class="form-check-label" for="cancel">
                          @lang('translation.cancel')
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('buttons.close')</button>
                    <button type="submit" class="btn btn-primary submit-btn">@lang('buttons.submit')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

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
          url: "{{ route('tickets.index', ['status' => request()->get('status')]) }}",
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
          targets: 6
        }],
        columns: [{
            data: 'id'
          },
          {
            data: 'user.name',
            sortable: false,
            searchable: false
          },
          {
            data: 'flight_info',
            searchable: false,
            sortable: false,
          },
          {
            data: 'route',
            searchable: false,
            sortable: false,
          },
          {
            data: 'time',
            searchable: false,
            sortable: false,
          },
          {
            data: 'seat_number'
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

    // change status modal
    let chanegStatusModal = document.getElementById('chanegStatusModal')
    chanegStatusModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      let button = event.relatedTarget

      // Update the modal's content.
      document.getElementById('chanegStatusForm').action = button.getAttribute('data-url');
    });

    // on form submit send ajax request
    $(".submit-btn").click(function(e) {
      e.preventDefault();
      let form = $("#chanegStatusForm");
      let url = form.attr('action');
      let data = form.serialize();

      $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function(data) {
          $('#chanegStatusModal').modal('hide');
          Swal.fire({
            timer: "1000",
            text: data.message,
            icon: "success"
          }).then(function() {
            table.draw();
          });

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
      });
    });
  </script>
@endsection
