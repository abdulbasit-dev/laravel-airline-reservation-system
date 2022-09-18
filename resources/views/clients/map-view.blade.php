@extends('layouts.master')

@section('title')
  @lang('translation.client.client')
@endsection

@section('css')
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
      @lang('translation.client.client_map')
    @endslot
  @endcomponent


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div id="leaflet-map-marker" class="leaflet-map"style='height:70vh'></div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection

@section('script')
  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>


  {{-- leaflet init --}}
  <script type="text/javascript">
    let data = {!! $clients !!};
    var markermap = L.map("leaflet-map-marker").setView([36.4253065, 43.8335954, -.09], 8);
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 120,
    minZoom: 1,
  }).addTo(markermap),
      data.forEach(data => {
        L.marker([data.lat, data.long, -.09])
          .bindPopup(`<div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">${data.name}</h5>
                        <div class="card-body">
                            <a href='{{route('clients.index')}}/${data.id}'><button type="button" class="btn btn-info waves-effect waves-light m-1"> @lang("buttons.show_client") </button></a>
                            <a href='{{route('visits.index')}}?client=${data.id}'><button type="button" class="btn btn-info waves-effect waves-light m-1"> @lang("buttons.view_visits") </button></a>
                            <a href='{{route('orders.index')}}?client=${data.id}'><button type="button" class="btn btn-success waves-effect waves-light m-1"> @lang("buttons.view_orders") </button></a><br>
                        <a href="tel:${data.phone}"><button type="button" class="btn btn-primary waves-effect waves-light m-1">${data.phone}</button></a>
                        <a href="https://maps.google.com/?q=${data.lat},${data.long}" target="_blank"><button type="button" class="btn btn-primary waves-effect waves-light m-1">@lang("buttons.google_map")</button></a></div>
                    </div>`, {closeOnClick: false, autoClose: true})
          .openPopup()
          .addTo(markermap)
      });
  </script>
@endsection
