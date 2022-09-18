@extends('layouts.master')

@section('title')
  @lang('translation.client.client')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.client.client')
    @endslot
    @slot('li_2')
      {{ route('clients.index') }}
    @endslot
    @slot('title')
      @lang('translation.client.client_list')
    @endslot
  @endcomponent

  {{-- import modal --}}
  @component('components.file-import')
    @slot('route')
      {{ route('clients.import') }}
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
                <a class="dropdown-item" href="{{ route('clients.export') }}">@lang('buttons.export')</a>
                <a class="dropdown-item" href="{{ route('exportTemplate', ['excel', 'clients']) }}">@lang('buttons.export_template_excel')</a></a>
                <a class="dropdown-item" href="{{ route('exportTemplate', ['csv', 'clients']) }}">@lang('buttons.export_template_csv')</a></a>
                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#importFile">@lang('buttons.import')</a>
              </div>
            </div>

            <a href="{{ route('clients.create') }}" class="btn btn-rounded btn-success waves-effect waves-light"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>@lang('translation.client.add_client')</a>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.client.name')</th>
                <th> @lang('translation.client.category')</th>
                <th> @lang('translation.client.phone')</th>
                <th> @lang('translation.client.loan_limit')</th>
                <th> @lang('translation.client.loan_count')</th>
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
        ajax: "{{ route('clients.index') }}",

        columns: [
          {
            data: 'id'
          },
          {
            data: 'name'
          },
          {
            data: 'category.name'
          },
          
          {
            data: 'phone'
          },
          {
            data: 'loan_limit'
          },
          {
            data: 'loan_count',
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
