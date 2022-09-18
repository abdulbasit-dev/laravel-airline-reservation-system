@extends('layouts.master')

@section('title')
  @lang('translation.car.car_info')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.car.car')
    @endslot
    @slot('li_2')
      {{ route('cars.index') }}
    @endslot
    @slot('title')
      @lang('translation.car.car_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body border-bottom">

          <div class="row">
            <div class="col-xl-6">
              <h5 class="mb-3">@lang('translation.car.car_info')</h5>
              <div class="table-responsive">
                <table class="table-borderless mb-0 table">
                  <tbody>
                    <tr>
                      <th scope="row" style="width: 400px;">#@lang('translation.resource_id', ['resource' => __('attributes.car')])</th>
                      <td>{{ $car->id }}</td>
                    </tr>
                    <tr>
                      <th scope="row" style="width: 400px;">@lang('translation.car.model')</th>
                      <td>{{ $car->model }}</td>
                    </tr>
                    <tr>
                      <th scope="row" style="width: 400px;">@lang('translation.car.plate_number')</th>
                      <td>{{ $car->plate_number }}</td>
                    </tr>
                    <tr>
                      <th scope="row" style="width: 400px;">@lang('translation.car.driver_name')</th>
                      <td>{{ $car->driver->name }}</td>
                    </tr>
                    <tr>
                      <th scope="row" style="width: 400px;">@lang('translation.created_at')</th>
                      <td>{{ $car->created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="col-xl-6">
              <div class="float-end dropdown ms-2">
                <a class="text-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-dots-horizontal font-size-18"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="javascript:void(0)">@lang('translation.actions')</a>
                  <a class="dropdown-item" href="{{ route('cars.edit', $car->id) }}">@lang('translation.edit_resource', ['resource' => __('attributes.car')])</a>
                  <a class="dropdown-item" href="javascript:void(0)" onclick="submitDeleteForm('carShowDeletForm_{{ $car->id }}')"> @lang('translation.delete_resource', ['resource' => __('attributes.car')])</a>
                  <form action="{{ route('cars.destroy', $car->id) }}" method="POST" id="carShowDeletForm_{{ $car->id }}">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">@lang('translation.car_expense.car_expense')</h5>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th> @lang('translation.car_expense.user')</th>
                <th> @lang('translation.car_expense.title')</th>
                <th> @lang('translation.car_expense.price')</th>
                <th> @lang('translation.car_expense.image')</th>
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
          [4, "desc"]
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
        ajax: "{{ route('cars.show', $car->id) }}",

        columns: [{
            data: 'id'
          },
          {
            data: 'user.name'
          },
          {
            data: 'title'
          },
          {
            data: 'price'
          },
          {
            data: 'price'
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


      // select dropdown for change the page length
      $('.dataTables_length select').addClass('form-select form-select-sm');

      // add margin top to the pagination and info 
      $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
    });
  </script>
@endsection
