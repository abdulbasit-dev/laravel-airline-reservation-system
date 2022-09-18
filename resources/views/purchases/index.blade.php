@extends('layouts.master')

@section('title')
  @lang('translation.purchase.purchase')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.purchase.purchase')
    @endslot
    @slot('li_2')
      {{ route('purchases.index') }}
    @endslot
    @slot('title')
      @lang('translation.purchase.purchase_list')
    @endslot
  @endcomponent


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-start mb-4">
            <div class="m-4">
              <label>@lang("translation.date_range")</label>
              <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                <input type="text" class="form-control" id="start" name="startDate" placeholder="Start Date" onchange="dateChanged()"/>
                <input type="text" class="form-control" id="end" name="endDate" placeholder="End Date" onchange="dateChanged()"/>
              </div>
          </div>
            {{-- <div class="m-4">
              <label>@lang("translation.purchase.purchase_by")</label>
              <select class="form-select" id="purchase_by" name="purchase_by" onchange="dateChanged()">
                <option value="" selected>@lang("translation.none")</option>
                  @forelse ($sale_rep as $sale)
                    <option value="{{$sale->id}}">{{$sale->name}}</option>
                @empty
                    <option value="">@lang("translation.none")</option>
                @endforelse
              </select>
            </div>
            <div class="m-4">
              <label>@lang("translation.purchase.supplier_name")</label>
              <select class="form-select" id="supplier" name="supplier" onchange="dateChanged()">
                <option value="" selected>@lang("translation.none")</option>
                  @forelse ($purchases as $purchase)
                    <option value="{{$purchase->supplier_id}}">{{$purchase->supplier->name}}</option>
                @empty
                    <option value="">@lang("translation.none")</option>
                @endforelse
              </select>
            </div> --}}

            <div class="ms-auto align-self-center" id="action_btns">
            <div class="btn-group mx-3">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">@lang('translation.actions') <i class="mdi mdi-chevron-down"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="{{ route('purchases.export') }}">@lang('buttons.export')</a>
              </div>
            </div>
           </div>
          </div>
        </div>

          <table id="datatable" class="table-hover table-bpurchaseed w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.purchase.user')</th>
                <th> @lang('translation.purchase.supplier')</th>
                <th> @lang('translation.purchase.paid')</th>
                <th> @lang('translation.purchase.due')</th>
                <th> @lang('translation.purchase.is_paid')</th>
                <th> @lang('translation.purchase.note')</th>
                <th> @lang('translation.created_at')</th>
                <th> @lang('translation.action')</th>
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


  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


  {{-- datatable init --}}
  <script type="text/javascript">
let table;
    function dateChanged(){
      table.draw();
    }
    getParameter = (key) => {
  
    address = window.location.search

    parameterList = new URLSearchParams(address)

  return parameterList.get(key)
}


    $(function() {

      if(getParameter('supplier')){
        $("#supplier option[value='"+getParameter('supplier')+"']").prop("selected",true);
        Swal.fire(
        'Good!',
        'This table shows Filted Data !',
        'success');
      }

      if(getParameter('purchase')){
        $("#purchase_by option[value='"+getParameter('purchase')+"']").prop("selected",true);
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
        purchase: [
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
          url:"{{ route('purchases.index') }}",
          method:"GET",
          data:function(d){
          d.startDate =$("#start").val();
          d.endDate= $("#end").val();
          d.purchase_by= $("#purchase_by").find(":selected").val();
          d.supplier= $("#supplier").find(":selected").val();
          }
        },
        columns: [{
            data: 'id'
          },
          {
            data: 'user',
          },
          {
            data: 'supplier',
          },
          {
            data: 'paid',
          },
          {
            data: 'due',
          },
          {
            data: 'is_paid',
          },
          {
            data: 'note',
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

      //datepicker Init
      $("#datepicker").datepicker();
    });
  </script>
@endsection
