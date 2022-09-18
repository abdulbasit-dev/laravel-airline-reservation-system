@extends('layouts.master')

@section('title')
  @lang('translation.visit.visit')
@endsection

@section('css')
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
  <style>
    img.huechange { filter: hue-rotate(120deg); }
    </style>
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.visit.visit')
    @endslot
    @slot('li_2')
      {{ route('visits.index') }}
    @endslot
    @slot('title')
      @lang('translation.visit.visit_info')
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
              <h5 class="">@lang('translation.visit.user') : {{ $visit->user->name }}</h5>
              <br>
              <h5 class="text-muted mb-1">@lang('translation.visit.client') : {{ $visit->client->name }}</h5>
              <br>
              <h5 class="text-muted mb-0">@lang('translation.visit.desicrption') : {{ $visit->text }}</h5>
              <br>
              <h5 class="text-muted mb-0">@lang('translation.visit.distance') : <p id="distance"></p></h5>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.visit.address_on_map')</h4>
          <div id="leaflet-map-marker" class="leaflet-map"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4"> {{ $visit->user->name }}'s Last Vists</h4>

          <div class="table-responsive">
            <table class="table-nowrap mb-0 table align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th> @lang('translation.visit.client')</th>
                  <th> @lang('translation.visit.desicrption')</th>
                  <th> @lang('translation.lat') </th>
                  <th> @lang('translation.lng') </th>
                  <th> @lang('translation.created_at')</th>
                  <th> @lang('translation.actions')</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($visit->user->visits->take(5) as $visit)
              <tr>
                <th scope="row">
                  {{$visit->id}}
                </th>
                <td>
                  <div class="text-muted">
                  {{$visit->client->name}}
                  </div>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$visit->text}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$visit->lat}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$visit->long}}</h5>
                </td>
                <td>
                  <h5 class="font-size-14 mb-1">{{$visit->created_at}}</h5>
                </td>
                <td style="width: 120px;">
                  <a href="{{route('visits.show',$visit->id)}}" class="btn btn-primary btn-sm w-xs">View</a>
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


  {{-- leaflet init --}}
  <script type="text/javascript">
    const visitLat = "{{ $visit->lat }}";
    const visitLong = "{{$visit->long }}";
    const clientLat = "{{ $visit->client->lat }}";
    const clientLong = "{{$visit->client->long }}";
    var markermap = L.map("leaflet-map-marker").setView([visitLat, visitLong, -.09], 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1
      }).addTo(markermap);
      
      let visit = L.marker([visitLat, visitLong, -.09]).bindPopup('@lang("translation.visit.visit_location")').addTo(markermap)
      let client = L.marker([clientLat, clientLong, -.09]) .bindPopup('@lang("translation.order.client_location")').addTo(markermap)
      client._icon.classList.add("huechange");
      markermap.fitBounds([
        [visit.getLatLng(), client.getLatLng()]
]);
    $("#distance").text(visit.getLatLng().distanceTo(client.getLatLng()).toFixed(2) +' @lang("translation.order.meters_away")');

  </script>
@endsection
