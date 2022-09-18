@extends('layouts.master')

@section('title')
  @lang('translation.order.order')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
      {{-- @lang('translation.order.') --}}
      @switch(request()->get('status'))
          @case("ordered")
                {{ __('sidebar.pending_orders') }}
              @break
          @case("canceled")
                {{ __('sidebar.canceled_orders') }}
              @break
          @case("accepted")
                {{ __('sidebar.accepted_orders') }}
              @break
          @case("assigned")
                {{ __('sidebar.assigned_orders') }}
              @break
          @case("pickedup")
                {{ __('sidebar.pickedup_orders') }}
              @break
          @case("delivered")
                {{ __('sidebar.delivered_orders') }}
              @break
          @case(null)
              {{ __('sidebar.all_order') }}
              @break
          @default
              
      @endswitch
    @endslot
  @endcomponent

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
              <label>@lang('translation.order.order_by')</label>
              <select class="form-select" id="order_by" name="order_by" onchange="dateChanged()">
                <option value="" selected>@lang('translation.none')</option>
                @forelse ($sale_rep as $sale)
                  <option value="{{ $sale->id }}">{{ $sale->name }}</option>
                @empty
                  <option value="">@lang('translation.none')</option>
                @endforelse
              </select>
            </div>
            <div class="m-4">
              <label>@lang('translation.order.client_name')</label>
              <select class="form-select" id="client" name="client" onchange="dateChanged()">
                <option value="" selected>@lang('translation.none')</option>
                @forelse ($orders as $order)
                  <option value="{{ $order->client_id }}">{{ $order->client->name }}</option>
                @empty
                  <option value="">@lang('translation.none')</option>
                @endforelse
              </select>
            </div>

            <div class="ms-auto align-self-center" id="action_btns">
              <div class="btn-group mx-3">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">@lang('translation.actions') <i class="mdi mdi-chevron-down"></i></button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="{{ route('contacts.export') }}">@lang('buttons.export')</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <table id="datatable" class="table-hover table-bordered w-100 table">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th> @lang('translation.order.client_name')</th>
              <th> @lang('translation.order.order_by')</th>
              <th> @lang('translation.order.total')</th>
              {{-- <th> @lang('translation.order.total_weight')</th> --}}
              <th> @lang('translation.order.profit')</th>
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
  </div> <!-- end row -->
@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>


  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


  {{-- datatable init --}}
  <script type="text/javascript">
    let table;

    function dateChanged() {
      table.draw();
    }
    getParameter = (key) => {

      address = window.location.search

      parameterList = new URLSearchParams(address)

      return parameterList.get(key)
    }


    $(function() {

      if (getParameter('client')) {
        $("#client option[value='" + getParameter('client') + "']").prop("selected", true);
        Swal.fire(
          'Good!',
          'This table shows Filted Data !',
          'success');
      }

      if (getParameter('order')) {
        $("#order_by option[value='" + getParameter('order') + "']").prop("selected", true);
        Swal.fire(
          'Good!',
          'This table shows Filted Data !',
          'success');
      }

      table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        lengthMenu: [10, 20, 50, 100],
        pageLength: 10,
        scrollX: true,
        order: [
          [8, "desc"]
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
          url: "{{ route('orders.index', ['status' => request()->get('status')]) }}",
          method: "GET",
          data: function(d) {
            d.startDate = $("#start").val();
            d.endDate = $("#end").val();
            d.order_by = $("#order_by").find(":selected").val();
            d.client = $("#client").find(":selected").val();
          }
        },
        columns: [{
            data: 'id',
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
          //   {
          //     data: 'total_weight',
          //   },
          {
            data: 'profit',
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

      //datepicker Init
      $("#datepicker").datepicker();
    });
  </script>
@endsection
