@extends('layouts.master')

@section('title')
  @lang('translation.client.add_client')
@endsection

@section('css')
  {{-- select2 --}}
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
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
      @lang('translation.client.add_client')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-6">
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
          <form class="needs-validation" novalidate action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-xl-12">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">@lang('translation.client.name')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.name')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="category" class="col-sm-3 col-form-label">@lang('translation.client.category')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="category" name="category" required>
                      <option value=""></option>
                      @foreach ($clientCategories as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.category')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="zone" class="col-sm-3 col-form-label">@lang('translation.client.zone')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="zone" name="zone" required>
                      <option value=""></option>
                      @foreach ($zones as $key => $value)
                        <option value="{{ $key }}" @selected($loop->first)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.zone')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone" class="col-sm-3 col-form-label">@lang('translation.client.phone')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.phone')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="phone_alt" class="col-sm-3 col-form-label">@lang('translation.client.phone_alt')</label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone_alt" name="phone_alt" value="{{ old('phone_alt') }}">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <label for="address" class="col-sm-3 col-form-label">@lang('translation.client.address')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.address')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">@lang('translation.client.loan_limit')</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="loan_limit" name="loan_limit" value="{{ old('loan_limit') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.loan_limit')])
                    </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">@lang('translation.client.address_on_map')</label>
                  <div class="col-sm-9">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="lat" class="form-label">@lang('translation.lat')</label>
                          <input type="text" class="form-control" id="lat" name="lat" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="lng" class="form-label">@lang('translation.lng')</label>
                          <input type="text" class="form-control" id="lng" name="long" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('translation.client.loan_limit')])
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

    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.client.client_map_pick')</h4>
          <div id="leaflet-map-marker" class="leaflet-map"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  {{-- Select2 --}}
  <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>




  <script>
    const lat = document.getElementById('lat');
    const lng = document.getElementById('lng');
    const address = document.getElementById('address');

    $(document).ready(function() {
      // Select2
      $(".select2").select2();
    });

    const markerInitLatLng = [36.19005296733725, 44.010028839111335, -.09];

    //  leaflet init 
    var map = L.map("leaflet-map-marker").setView(markerInitLatLng, 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1
    }).addTo(map)

    // const markerInitLatLng = [36.19005296733725, 44.010028839111335, -.09];

    let marker = new L.marker(markerInitLatLng, {
      draggable: true,
      autoPan: true
    }).addTo(map)


    const updateLatLng = (data) => {
      lat.value = data.lat;
      lng.value = data.lng;
    }

    marker.on('dragend', function(e) {
      // update the lat lng field 
      updateLatLng(marker.getLatLng());
    });

    map.on('click', function(e) {
      let lat = e.latlng.lat;
      let lng = e.latlng.lng;

      // update the lat lng field 
      updateLatLng({
        lat,
        lng
      });

      // update the marker position
      if (!marker) {
        L.marker(e.latlng).addTo(map)
      } else {
        marker.setLatLng(e.latlng);
      }
    });
  </script>
@endsection
