@extends('layouts.master')

@section('title')
  @lang('translation.add_resource', ['resource' => __('attributes.flight')])
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.flight.flight')
    @endslot
    @slot('li_2')
      {{ route('flights.index') }}
    @endslot
    @slot('title')
      @lang('translation.add_resource', ['resource' => __('attributes.flight')])
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="needs-validation" novalidate action="{{ route('flights.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="airline" class="col-sm-3 col-form-label">@lang('translation.flight.airline')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="airline" name="airline_id" required>
                      <option value="">@lang('translation.none')</option>
                      @foreach ($airlines as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.flight.airline')])
                    </div>
                  </div>
                </div>

                {{-- planes --}}
                <div class="row mb-4">
                  <label for="plane" class="col-sm-3 col-form-label">@lang('translation.flight.plane')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="plane" name="plane_id" required></select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.flight.plane')])
                    </div>
                  </div>
                </div>

                {{-- time (departure, arival) --}}
                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">@lang('translation.flight.time')</label>
                  <div class="col-sm-9">
                    <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                      <input type="date" class="form-control filter-input" id="departure" name="departure" placeholder="@lang('translation.flight.departure')" required />
                      <input type="date" class="form-control filter-input" id="arrival" name="arrival" placeholder="@lang('translation.flight.arrival')" required />

                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.flight.time')])
                      </div>
                    </div>
                  </div>
                </div>

                {{-- route (origin, destination) --}}
                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">@lang('translation.flight.route')</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="origin" class="col-sm-3 col-form-label">@lang('translation.flight.origin')</label>
                          <select class="form-control select2" id="origin" name="origin_id" required>
                            <option value="">@lang('translation.none')</option>
                            @foreach ($airports as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            @lang('validation.good')
                          </div>
                          <div class="invalid-feedback">
                            @lang('validation.required', ['attribute' => __('translation.flight.origin')])
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="destination" class="col-sm-3 col-form-label">@lang('translation.flight.destination')</label>
                          <select class="form-control select2" id="destination" name="destination_id" required>
                            <option value="">@lang('translation.none')</option>
                            @foreach ($airports as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            @lang('validation.good')
                          </div>
                          <div class="invalid-feedback">
                            @lang('validation.required', ['attribute' => __('translation.flight.destination')])
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- price --}}
                <div class="row mb-4">
                  <label for="price" class="col-sm-3 col-form-label">@lang('translation.flight.price')</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-text">$</div>
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                      <div class="valid-feedback">
                        @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('translation.flight.price')])
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">@lang('buttons.submit')</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>
@endsection
@section('script')
  {{-- bootstrap-datepicker --}}
  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

  <script>
    // ready document 
    $(document).ready(function() {
      // init datepicker
      $('.input-daterange').datepicker({
        autoclose: true,
        startDate: new Date()
      });

      //on chanage airline select
      $('#airline').on('change', function() {
        //get airline id
        let airline_id = $(this).val();
        //if airline id is not empty
        if (airline_id != '') {
          //get planes by airline id
          // before send ajax request reset plane select
          $('#plane').html('');
          $.ajax({
            url: "{{ route('flights.getPlanesByAirline') }}",
            type: "GET",
            data: {
              airline_id: airline_id
            },
            success: function(data) {
              //if data is not empty
              if (data != '') {
                //set plane select2 options
                $('#plane').select2({
                  data: data
                });
              } else {
                $('#plane').select2({
                  data: [{
                    id: '',
                    text: "@lang('translation.flight.no_plane_found')"
                  }]
                });
              }
            }
          });
        }
      });

      // origin and destination should not be same
      $('#destination').on('change', function() {
        let destination = $(this).val();
        let origin = $('#origin').val();
        if (origin == destination) {
          swal.fire({
            text: "@lang('messages.origin_destination_same')",
            icon: "error",
            timer: 1000,
            showCancelButton: false,
            confirmButtonText: "@lang('buttons.ok')",
          }).then((result) => {
            if (result.isConfirmed) {
              $('#destination').val('').trigger('change');
            }
          });
        }
      });

    });
  </script>
@endsection
