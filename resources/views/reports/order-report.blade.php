@extends('layouts.master')

@section('title')
  @lang('translation.order.order')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.order.order')
    @endslot
    @slot('li_2')
      {{ route('reports.order') }}
    @endslot
    @slot('title')
      @lang('translation.order.order_list')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3">
              <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">@lang('translation.order.order_by')</label>
                <select class="form-select select2 filter-input" id="order_by" name="order_by" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($saleReps as $sale)
                    <option value="{{ $sale->id }}">{{ $sale->name }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label>@lang('translation.order.client_name')</label>
                <select class="form-select select2 filter-input" id="client" name="client" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($orders as $order)
                    <option value="{{ $order->client_id }}">{{ $order->client->name }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label>@lang('translation.order.status')</label>
                <select class="form-select select2 filter-input" id="order_status" name="order_status" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  @forelse ($statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                  @empty
                    <option value="">@lang('translation.none')</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="mb-3">
                <label>@lang('translation.order.payment_status')</label>
                <select class="form-select select2 filter-input" id="payment_status" name="payment_status" onchange="dateChanged()">
                  <option value="" selected>@lang('translation.none')</option>
                  <option value="1">@lang('translation.paid')</option>
                  <option value="0">@lang('translation.due')</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label>@lang('translation.date_range')</label>
            <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
              <input type="text" class="form-control filter-input" id="start" name="startDate" placeholder="Start Date" onchange="dateChanged()" />
              <input type="text" class="form-control filter-input" id="end" name="endDate" placeholder="End Date" onchange="dateChanged()" />
            </div>
          </div>

          <div>
            <button class="btn btn-primary w-sm" onclick="reset()">@lang('buttons.reset')</button>
          </div>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  {{-- datatable --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-4" id="action_btns">
          </div>
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
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection

@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
  {{-- bootstrap-datepicker --}}
  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


  {{-- datatable init --}}
  <script type="text/javascript">
    let table;

    //select2 Init
    $(".select2").select2();
    
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
          url: "{{ route('reports.order') }}",
          method: "GET",
          data: function(d) {
            d.startDate = $("#start").val();
            d.endDate = $("#end").val();
            d.order_by = $("#order_by").find(":selected").val()
            d.client = $("#client").find(":selected").val();
            d.status = $("#order_status").find(":selected").val();
            d.payment_status = $("#payment_status").find(":selected").val();

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
    });

  </script>
@endsection
