@extends('layouts.master')

@section('title')
  @lang('translation.client.client')
@endsection

@section('css')
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('/assets/libs/leaflet/MarkerCluster.Default.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('/assets/libs/leaflet/MarkerCluster.css') }}" rel="stylesheet" type="text/css" />
    

  <!-- toastr Css -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">

<style>
  img.huechange { filter: hue-rotate(120deg); }
</style>

@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.tracking.tracking')
    @endslot
    @slot('li_2')
      {{ route('tracking.live') }}
    @endslot
    @slot('title')
      @lang('translation.tracking.tracking_live')
    @endslot
  @endcomponent



  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div id="map" class="leaflet-map"style='height:70vh'></div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
  @endsection
  
  @section('script')
  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.js') }}"></script>
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.markercluster-src.js') }}"></script>
  
  <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
  
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  
  {{-- leaflet init --}}
  <script type="text/javascript">
    let map;
    let markerObjects=[];  
    let locations = JSON.parse('{!! $locations !!}');
    let users =@json($users);
    let polyline = [];
    let currentMarker;
    var markers;


//Map Init
var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    minZoom: 2,
    subdomains:['mt0','mt1','mt2','mt3']
}), latlng = L.latLng(36.0860875,44.0308723);

		map = L.map('map', {center: latlng, zoom: 9.21, layers: [tiles]});

		markers = L.markerClusterGroup();

      map.addLayer(markers);


// cluster dosent work here ?
//     function mapInit() {
// let tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
//     subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
//     maxZoom: 120,
//     minZoom: 2,
//   }), latlng = L.latLng(36.4253065, 43.8335954);
//   map = L.map('map', { center: latlng, zoom: 8, layers: [tiles] });
//    markers = L.layerGroup();//markerClusterGroup
// }
// mapInit();
// map.addLayer(markers);

function addMarker(data) {
  let user;
  console.log(data.id);
  users.forEach((ele) => {
    if(data.id == ele.id){
      user = ele;
      console.log(1);
    }
  });
  console.log(user);
  popup = `<div class="card">
                  <h5 class="card-header bg-transparent border-bottom text-uppercase">${user.name}</h5>
                   <div class="card-body">
                    <h4 class="card-title">${data.time}</h4>
                    <a href='{{route('visits.index')}}?user=${user.id}'><button type="button" class="btn btn-info waves-effect waves-light m-1">@lang("buttons.view_visits") </button></a>
                    <a href='{{route('orders.index')}}?order=${user.id}'><button type="button" class="btn btn-success waves-effect waves-light m-1">@lang("buttons.view_orders") </button></a><br>
                    <a href="tel:${user.phone}"><button type="button" class="btn btn-primary waves-effect waves-light m-1">${user.phone}</button></a>
                    <a href="https://maps.google.com/?q=${data.lat},${data.lng}" target="_blank"><button type="button" class="btn btn-primary waves-effect waves-light m-1">@lang("buttons.google_map")</button></a>
                  </div>
                </div>`;

  var title = "Node" + data.id +"<a href='send'>  <button class='custom-btn btn-3'><span>Read More</span></button></a>";
        var marker = L.marker(new L.LatLng( data.lat,  data.lng), { title: title,id: data.id });
        marker.bindPopup(popup);
        markers.addLayer(marker);
        markerObjects.push(marker);


//select listner!
marker.on('click', function(marker){
          selectMarker(marker.target);
});
        return marker;
      }
      
  function selectMarker(marker){
    currentMarker?._icon.classList.remove("huechange");          
  currentMarker = marker;
  currentMarker._icon.classList.add("huechange");
}
function loadLastLocations(){
  for (const i in locations) {
        addMarker(locations[i]);
      };
    }


loadLastLocations();

function UpdateOrcreateMarker(data) {
  found = false;
  markerObjects.forEach((location)=>{
    console.log(location);
    if(location.options.id==data.id){
        location.setLatLng(new L.LatLng(data.lat, data.lng));   
        found=true;   
    }
  });

  if(!found){
          // console.log("doesnt exist!");
    var title = "Node" + data.id +"<a href='test'>  <button class='custom-btn btn-3'><span>Read More</span></button></a>";
          
    var marker = L.marker(new L.latLng(data.lat,data.lng), { title: title,id:data.id});
    
    marker.bindPopup(title);
    console.log(marker);
    markerslayer.addLayer(marker);
    markerObjects.push(marker);
    }
  }
      </script>

      <!-- Pusher -->
    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher('cfc49d870e71acb73fa7', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('TrackingMap');
        channel.bind('UpdateLocation', function(data) {

          // console.log(data.data);

          UpdateOrcreateMarker(data.data);
        });
        </script>
@endsection
