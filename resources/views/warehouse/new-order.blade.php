@extends('layouts.master')

@section('title')
  @lang('translation.new_order.new_order')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.new_order.new_order')
    @endslot
    @slot('li_2')
      {{ route('new-order.index') }}
    @endslot
    @slot('title')
      @lang('translation.new_order.new_order_list')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-4" id="action_btns">

            <div class="btn-group mx-3">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">@lang('translation.actions') <i class="mdi mdi-chevron-down"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-'item" href="{{ route('visit-description.export') }}">@lang('buttons.export')</a>
              </div>
            </div>
          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.order.client_name')</th>
                <th> @lang('translation.order.order_by')</th>
                <th> @lang('translation.order.total')</th>
                <th> @lang('translation.new_order.paid_status')</th>
                <th> @lang('translation.new_order.accept_by')</th>
                <th> @lang('translation.new_order.arrive_at')</th>
                <th> @lang('translation.created_at')</th>
                <th> @lang('translation.actions')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" id="cancelForm" action="" onsubmit="disableInput()">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('translation.new_order.write_cancel_note')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                      <label for="cancel_note" class="col-form-label">@lang('translation.new_order.cancel_note'):</label>
                      <input type="text" class="form-control" id="cancel_note" name="cancel_note">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('buttons.close')</button>
                    <button type="submit" class="btn btn-primary subm" id="submit">@lang('buttons.submit')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <span></span>

          <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" id="assignForm" action="" onsubmit="disableInput()">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('translation.new_order.assign_driver')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div id="assigned">
                    </div>
                    @csrf
                    <label for="assign" class="col-form-label">@lang('translation.new_order.driver'):</label>
                    <div class="ajax-select mt-lg-0 mb-3 mt-3">
                      <select class="form-control select2" id="assign" name="pickedup_by" style="width: 100% !important;">
                        @forelse ($drivers as $driver => $id)
                          <option value="{{ $id }}">{{ $driver }}</option>
                        @empty
                          <option value=""></option>
                        @endforelse
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('buttons.close')</button>
                    <button type="submit" class="btn btn-primary subm">@lang('buttons.submit')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

  {{-- datatable init --}}
  <script type="text/javascript">
    $(function() {
      let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 50,
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
        ajax: "{{ route('new-order.index') }}",

        columns: [{
            data: 'id'
          },
          {
            data: 'client'
          },
          {
            data: 'user.name'
          },
          {
            data: 'total_price'
          },
          {
            data: 'paid'
          },
          {
            data: 'admin.name'
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
        columnDefs: [{
          targets: 6,
          render: function(data, type, row) {
            return data.length > 15 ?
              data.substr(0, 15) + '…' :
              data;
          }
        }],
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

      //cancel modal
      let cancelModal = document.getElementById('cancelModal')
      cancelModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget

        // Update the modal's content.
        document.getElementById('cancelForm').action = button.getAttribute('data-bs-url');
      });

      //assign modal
      let assignModal = document.getElementById('assignModal')
      assignModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget

        const driverName = button.getAttribute('data-driver')
        if (driverName) {
          document.getElementById('assigned').innerHTML = `<h4>Assigned Driver: <span class="text-info">${driverName}</span></h4>`
        } else {
          document.getElementById('assigned').innerHTML = ``
        }

        // Update the modal's content.
        document.getElementById('assignForm').action = button.getAttribute('data-bs-url');
      });

      $("#assign").select2({
        dropdownParent: $('#assignModal')
      });

    });

    function disableInput() {
      $(".subm").prop('disabled', true);
      setInterval(() => {
        $(".subm").prop('disabled', false);
      }, 10000);
    }
  </script>
@endsection
