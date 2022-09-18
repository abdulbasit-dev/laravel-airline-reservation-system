@extends('layouts.master')

@section('title')
  @lang('translation.payment.payment')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.payment.payment')
    @endslot
    @slot('li_2')
      {{ route('payments.index') }}
    @endslot
    @slot('title')
      @lang('translation.payment.payment_list')
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
              <label>@lang("translation.payment.payment_by")</label>
              <select class="form-select" id="payment_by" name="payment_by" onchange="dateChanged()">
                <option value="" selected>@lang("translation.none")</option>
                  @forelse ($sale_rep as $sale)
                    <option value="{{$sale->id}}">{{$sale->name}}</option>
                @empty
                    <option value="">@lang("translation.none")</option>
                @endforelse
              </select>
            </div>
            <div class="m-4">
              <label>@lang("translation.payment.client_name")</label>
              <select class="form-select" id="client" name="client" onchange="dateChanged()">
                <option value="" selected>@lang("translation.none")</option>
                  @forelse ($payments as $payment)
                    <option value="{{$payment->client_id}}">{{$payment->client->name}}</option>
                @empty
                    <option value="">@lang("translation.none")</option>
                @endforelse
              </select>
            </div> --}}

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

          <table id="datatable" class="table-hover table-bpaymented w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.payment_history.client')</th>
                <th> @lang('translation.payment_history.user')</th>
                <th> @lang('translation.payment_history.amount_paid')</th>
                <th> @lang('translation.payment_history.is_money_returned')</th>
                <th> @lang('translation.payment_history.money_accepted_by')</th>
                <th> @lang('translation.payment_history.safe_id')</th>
                <th> @lang('translation.payment_history.usd_rate')</th>
                <th> @lang('translation.payment_history.exchange_type')</th>
                <th> @lang('translation.payment_history.date')</th>
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

      if(getParameter('client')){
        $("#client option[value='"+getParameter('client')+"']").prop("selected",true);
        Swal.fire(
        'Good!',
        'This table shows Filted Data !',
        'success');
      }

      if(getParameter('payment')){
        $("#payment_by option[value='"+getParameter('payment')+"']").prop("selected",true);
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
        payment: [
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
          url:"{{ route('payment-history.index') }}",
          method:"GET",
          data:function(d){
          d.startDate =$("#start").val();
          d.endDate= $("#end").val();
          d.payment_by= $("#payment_by").find(":selected").val();
          d.client= $("#client").find(":selected").val();
          }
        },
        columns: [{
            data: 'id'
          },
          {
            data: 'client.link',
          },
          {
            data: 'user.name',
          },
          {
            data: 'amount_paid',
          },
          {
            data: 'is_money_returned',
          },
          {
            data: 'money_accepted_by',
          },
          {
            data: 'safe_id',
          },
          {
            data: 'usd_rate',
          },
          {
            data: 'exchange_type',
          },
          {
            data: 'date',
          },
          {
            data: 'created_at',
          },
          {
            data: 'action',
            paymentable: false,
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
