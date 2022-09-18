@extends('layouts.master')

@section('title')
  @lang('translation.expense_tag.expense_tag')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.expense_tag.expense_tag')
    @endslot
    @slot('li_2')
      {{ route('expense-tags.index') }}
    @endslot
    @slot('title')
      @lang('translation.expense_tag.expense_tag_list')
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
            <button type="button" class="btn btn-rounded btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=""> <i class="bx bx-plus font-size-16 me-2 align-middle"></i>@lang('translation.expense_tag.add_expense_tag') </button>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.expense_tag.name')</th>
                <th> @lang('translation.created_at')</th>
                <th> @lang('translation.actions')</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form method="POST" action="{{route('expense-tags.store')}}" onsubmit="disableInput()">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('translation.expense_tag.add_expense_tag')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          @csrf
                            <div class="mb-3">
                                <label for="name" class="col-form-label">@lang('translation.expense_tag.name'):</label>
                                <input type="text" class="form-control" id="name" name="name">
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="" id="editFrom" onsubmit="disableInput()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('translation.expense_tag.edit_expense_tag')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  @csrf
                  @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="col-form-label">@lang('translation.expense_tag.name'):</label>
                        <input type="text" class="form-control" id="name" name="name">
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
          [1, "desc"]
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
        ajax: "{{ route('expense-tags.index') }}",

        columns: [{
            data: 'id'
          },
          {
            data: 'name'
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

      let exampleModal = document.getElementById('editModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  let button = event.relatedTarget
  
  document.getElementById('editFrom').action = button.getAttribute('data-bs-url');

  // Update the modal's content.
  let modalTitle = exampleModal.querySelector('.modal-title')
  let modalBodyInput = exampleModal.querySelector('.modal-body input#name')
  modalBodyInput.value = button.getAttribute('data-bs-name')
})
    });
        
    function disableInput(){
        $(".subm").prop('disabled', true);
        setInterval(() => {
          $(".subm").prop('disabled', false);
        }, 10000);
      }

  </script>
@endsection
