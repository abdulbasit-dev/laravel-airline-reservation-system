@extends('layouts.master')

@section('title')
  @lang('translation.expense.expense')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.expense.expense')
    @endslot
    @slot('li_2')
      {{ route('expenses.index') }}
    @endslot
    @slot('title')
      @lang('translation.expense.expense_list')
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
                <a class="dropdown-item" href="{{ route('expenses.export') }}">@lang('buttons.export')</a>
                <a class="dropdown-item" href="{{ route('exportTemplate', ['excel', 'expenses']) }}">@lang('buttons.export_template_excel')</a></a>
                <a class="dropdown-item" href="{{ route('exportTemplate', ['csv', 'expenses']) }}">@lang('buttons.export_template_csv')</a></a>
              </div>
            </div>

            <a href="{{ route('expenses.create') }}" class="btn btn-rounded btn-success waves-effect waves-light"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>@lang('translation.expense.add_expense')</a>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.expense.title')</th>
                <th width="20%"> @lang('translation.expense.description')</th>
                <th> @lang('translation.expense.price')</th>
                <th> @lang('translation.expense.user')</th>
                <th> @lang('translation.expense.safe')</th>
                <th> @lang('translation.expense.tag')</th>
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
        ajax: "{{ route('expenses.index') }}",

        columns: [{
            data: 'id'
          },
          {
            data: 'title'
          },
          {
            data: 'description'
          },
          {
            data: 'price'
          },
          {
            data: 'user.name'
          },
          {
            data: 'safe_id'
          },
          {
            data: 'tag.name'
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
          targets: 2,
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
    });
  </script>
@endsection
