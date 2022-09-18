@extends('layouts.master')

@section('title')
  @lang('translation.client.client')
@endsection

@section('css')
  <!-- leaflet Css -->
  <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">

@endsection


@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.tracking.tracking')
    @endslot
    @slot('li_2')
      {{ route('tracking.history') }}
    @endslot
    @slot('title')
      @lang('translation.tracking.tracking_history')
    @endslot
  @endcomponent


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="" id="filterForm">
          <div class="mb-3 row">
            <label for="example-datetime-local-input" class="col-md-2 col-form-label">  @lang('translation.tracking.date')</label>
            <div class="col-md-10">
              <div class="input-group date">
                <input type="text" id='date' data-provide="datepicker" class="form-control" placeholder="yyyy-m-d" data-date-format="yyyy-m-d" onchange="updateMap()">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            </div>
          </div>
        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">  @lang('translation.tracking.user')</label>
          <div class="col-md-10">
              <select class="form-select" id="user" name="user" onchange="updateMap()">
                @forelse ($users as $user)
                    <option value="{{$user->id}}" data-phone='{{$user->phone}}'>{{$user->name}}</option>
                @empty
                    <option value="">@lang("translation.none")</option>
                @endforelse
              </select>
          </div>
        </div>
            </form>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">@lang('translation.tracking.movement_speed')</label>
              <div class="col-md-10">
                <select class="form-select" id="speed">
                  <option value="1000">.25x</option>
                  <option value="500">.5x</option>
                  <option value="250" selected>1x</option>
                  <option value="125">2x</option>
                  <option value="62.5">4x</option>
                </select>              </div>
          </div>
          </div>
          <button type="button" class="btn btn-primary waves-effect waves-light"  onclick="viewMovement()"> @lang('translation.tracking.view_movment') </button>

      </div>
          <div id="map" class="leaflet-map"style='height:70vh'></div>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection

@section('script')

  <!-- leaflet plugin -->
  <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.js') }}"></script>
  
  <!-- datePicker-->
  <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

  {{-- leaflet init --}}
  <script type="text/javascript">
      $('#date').datepicker({
    format: 'yyyy-m-d',
    todayHighlight:'TRUE',
    autoclose: true,
})

      let map;
      let points = [];
      let markers = [];
      let polyline = [];
      let locations = [];
      let markerslayer = L.layerGroup();
      let vanLayer = L.layerGroup();
      let vanIcon = L.icon({
        iconUrl: '{{asset("assets/images/van.svg")}}',
        iconSize: [33.1755, 64.26125],
        iconAnchor: [25, 50],
        popupAnchor: [-3, -76],
        // shadowUrl: 'my-icon-shadow.png',
        // shadowSize: [68, 95],
        // shadowAnchor: [22, 94]
      });
      let setTimeouts=[];

      function addMarker(data, edge = false) {
        name = $("#user").find(":selected").text();
        phone = $("#user").find(":selected").attr('data-phone');
        id = $("#user").find(":selected").val();
        if (!edge) {
          
          title = "<b> User " + name + "</b> <br> <time>" + data.time + "</time> <br>{" + data.lat + " " + data.lng + "}<br> <a href='#test'> <button class='custom-btn btn-3'><span>Read More</span></button></a>";
          marker = L.circle(new L.LatLng(data.lat, data.lng), { title: title, id: data.id });

        } else {
          title = "<b> User " + name + "</b> <br> <time>" + data.time + "</time> <br>{" + data.lat + " " + data.lng + "}<br> <a href='#test'> <button class='custom-btn btn-3'><span>Read More</span></button></a>";
          marker = L.marker(new L.LatLng(data.lat, data.lng), { title: title, id: data.id });
        }
        popup = `<div class="card">
                  <h5 class="card-header bg-transparent border-bottom text-uppercase">${name}</h5>
                   <div class="card-body">
                    <h4 class="card-title">${data.time}</h4>
                    <a href='{{route('visits.index')}}?user=${id}'><button type="button" class="btn btn-info waves-effect waves-light m-1"> @lang("buttons.view_visits")</button></a>
                    <a href='{{route('orders.index')}}?order=${id}'><button type="button" class="btn btn-success waves-effect waves-light m-1">@lang("buttons.view_orders") </button></a><br>
                    <a href="tel:${phone}"><button type="button" class="btn btn-primary waves-effect waves-light m-1">${phone}</button></a>
                    <a href="https://maps.google.com/?q=${data.lat},${data.lng}" target="_blank"><button type="button" class="btn btn-primary waves-effect waves-light m-1">@lang("buttons.google_map")</button></a>
                  </div>
                </div>`;
        marker.bindPopup(popup, {closeOnClick: false, autoClose: true});
        markerslayer.addLayer(marker);
        points.push(marker.getLatLng());
        markers.push(marker);
      }

      function viewMovement() {
        setTimeouts.forEach(clearTimeout);
        if (map.hasLayer(vanLayer)) {

          // Clear layer group
          vanLayer.clearLayers();
          map.removeLayer(vanLayer);
          vanLayer = L.layerGroup();
        }

        speed = $("#speed").find(":selected").val();

        let van = L.marker(markers[0].getLatLng(), { id: markers[0].id, icon: vanIcon });
        
        vanLayer.addLayer(van);
        
        map.addLayer(vanLayer);

        let count;
        let i = 1;
        for (count = 0; count < markers.length - 1; count++) {
          setTimeouts.push(setTimeout(function () {
            changeVanLatLng(i);
            i++;
          }, speed * count));
          function changeVanLatLng(i){
            van.setLatLng(markers[i].getLatLng());
            vanLayer.addLayer(van);
          }

          van.on("click",()=>{
            vanLayer.remove(van);
          })
        }

        map.on('zoomend', function () {
          let currentZoom = map.getZoom();
          vanIcon = new L.Icon({
            iconUrl: vanIcon.options.iconUrl,
            iconSize: [map.getZoom * 1.2, map.getZoom * 1.2],
          });
          van.setIcon(vanIcon);
        });
        // map.removeLayer(vanLayer);

      }

      function mapInit() {
        let tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
          maxZoom: 120,
          minZoom: 1,
        }), latlng = L.latLng(36.14728987271123, 44.088074724634765);
        map = L.map('map', { center: latlng, zoom: 10, layers: [tiles] });
      }



      // loading data 
      function fetchData() {
        var data={};

        date = $("#date").val();
        if(date){
          data['date']=date;
        }

        data["_token"] = "{{ csrf_token() }}";
        data['id'] = $("#user").find(":selected").val(); 
        
        $.ajax({
          url: "{{route('tracking.filter')}}",
          type: "POST",
          data: data,
          async: false
        }).done(function (data) {
          if(data.length < 1){
            Swal.fire({
              text: "{{ __('messages.not_found') }}",
              icon: "error"
            });
            return false;
          }
          locations = data;
          return true;
        }).fail(function (jqXHR, status, err) {
          Swal.fire({
            text: "{{ __('messages.error') }}",
            icon: "error"
          });
        });
      }

      function updateMap() {
        map.removeLayer(polyline);
        markerslayer.clearLayers();
        if(fetchData()==false || locations.length<1){
            return null;
        }
        markerslayer.clearLayers();
        markerslayer = L.layerGroup();
        points = [];
        markers = [];
        // console.log(locations);

        addMarker(locations[0], true);
        for (let i = 1; i < locations.length - 1; i++) {
          addMarker(locations[i], false);
        }
        addMarker(locations[locations.length - 1], true);

        map.addLayer(markerslayer);

        //lines
        polyline = L.polyline(points, { color: 'red' }).addTo(map);
        }

      mapInit();
      updateMap();


  </script>
@endsection
