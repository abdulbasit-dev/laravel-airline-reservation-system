@extends('layouts.master')

@section('title')
  @lang('translation.stand.stand')
@endsection

@section('css')
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Lightbox css -->
    <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
    
  <style>
    img.huechange { filter: hue-rotate(120deg); }
    </style>
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.stand.stand')
    @endslot
    @slot('li_2')
      {{ route('stands.index') }}
    @endslot
    @slot('title')
      @lang('translation.stand.stand_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body border-bottom">
          <div class="float-end dropdown ms-2">
            <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-horizontal font-size-18"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>

          <div>
            <div class="me-3 mb-4">
              <i class="mdi mdi-account-circle text-primary h1"></i>
            </div>
            <div>
              <h5 class="">@lang('translation.stand.user') : {{ $stand->user->name }}</h5>
              <br>
              <h5 class="text-muted mb-1">@lang('translation.stand.client') : {{ $stand->client->name }}</h5>
              <br>
              <h5 class="text-muted mb-0">@lang('translation.stand.desicrption') : {{ $stand->text }}</h5>
              <br>
              <h5 class="text-muted mb-0">@lang('translation.stand.distance') : <p id="distance"></p></h5>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <a class="standImageLightBox" href="{{ getFile($stand) }}">
            <img alt="stand image" src="{{ getFile($stand) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto ">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
                <h4 class="card-title mb-4">@lang('translation.stand.address_on_map')</h4>
                <div id="leaflet-map-marker" class="leaflet-map"></div>
          <br>
          <h4 class="card-title mb-4"> {{ $stand->user->name }} @lang('translation.stand.user_stands')</h4>

          <div class="table-responsive">
            <table class="table-nowrap mb-0 table align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th> @lang('translation.stand.client')</th>
                  <th> @lang('translation.stand.desicrption')</th>
                  <th> @lang('translation.lat') </th>
                  <th> @lang('translation.lng') </th>
                  <th> @lang('translation.created_at')</th>
                  <th> @lang('translation.actions')</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($stand->user->stands->take(5) as $stand)
              <tr>
                <th scope="row">
                  {{$stand->id}}
                </th>
                <td>
                  <div class="text-muted">
                  {{$stand->client->name}}
                  </div>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$stand->text}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$stand->lat}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$stand->long}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$stand->created_at}}</h5>
                </td>
                <td style="width: 120px;">
                  <a href="{{route('stands.show',$stand->id)}}" class="btn btn-primary btn-sm w-xs">View</a>
                </td>
              </tr>
              @empty
                  <p>No users</p>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>

  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

  <script>
    // lightbox init
    $(".standImageLightBox").magnificPopup({
      type: "image",
      closeOnContentClick: !0,
      closeBtnInside: !1,
      fixedContentPos: !0,
      mainClass: "mfp-no-margins mfp-with-zoom",
      image: {
        verticalFit: !0
      },
      zoom: {
        enabled: !0,
        duration: 300
      }
    })
    </script>
  {{-- leaflet init --}}
  <script type="text/javascript">
    const standLat = "{{ $stand->lat }}";
    const standLong = "{{$stand->long }}";
    const clientLat = "{{ $stand->client->lat }}";
    const clientLong = "{{$stand->client->long }}";
    var markermap = L.map("leaflet-map-marker").setView([standLat, standLong, -.09], 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1
      }).addTo(markermap);
      
      let stand = L.marker([standLat, standLong, -.09]).bindPopup('@lang("translation.stand.stand_location")').addTo(markermap)
      let client = L.marker([clientLat, clientLong, -.09]) .bindPopup('@lang("translation.order.client_location")').addTo(markermap)
      client._icon.classList.add("huechange");
      markermap.fitBounds([
        [stand.getLatLng(), client.getLatLng()]
]);
    $("#distance").text(stand.getLatLng().distanceTo(client.getLatLng()).toFixed(2) +' @lang("translation.order.meters_away")');

  </script>
@endsection
