@extends('layouts.master')

@section('title')
  @lang('translation.resource_report', ['resource' => __('attributes.supplier')])
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
      @lang('translation.supplier.supplier')
    @endslot
    @slot('li_2')
      {{ route('reports.supplier') }}
    @endslot
    @slot('title')
      @lang('translation.resource_report', ['resource' => __('attributes.supplier')])
    @endslot
  @endcomponent

  {{-- datatable --}}
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
                <th> @lang('translation.supplier.name')</th>
                <th> @lang('translation.supplier.company_name')</th>
                <th> @lang('translation.supplier.product_count')</th>
                <th> @lang('translation.supplier.address')</th>
                <th> @lang('translation.supplier.phone')</th>
                <th> @lang('translation.created_at')</th>
                {{-- <th> @lang('translation.actions')</th> --}}
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

  <script type="text/javascript">
    let table;

    //select2 Init
    $(".select2").select2();

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
          [6, "desc"]
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
          url: "{{ route('reports.supplier') }}",
          method: "GET",
          data: function(d) {
            
          }
        },
        columns: [{
            data: 'id'
          },
          {
            data: 'name'
          },
          {
            data: 'company_name'
          },
          {
            data: 'products_count'
          },
          {
            data: 'address'
          },
          {
            data: 'phone'
          },
          {
            data: 'created_at',
          },

        //   {
        //     data: 'action',
        //     orderable: false,
        //     searchable: false
        //   },
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
