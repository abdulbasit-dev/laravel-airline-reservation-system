@extends('layouts.master')

@section('title') @lang('translation.Leaflet_Maps') @endsection

@section('css')
    <!-- leaflet Css -->
    <link href="{{ URL::asset('/assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Maps @endslot
        @slot('title') Leaflet Maps @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Example</h4>
                    <div id="leaflet-map" class="leaflet-map"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Markers, circles and polygons</h4>
                    <div id="leaflet-map-marker" class="leaflet-map"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Working with popups</h4>
                    <div id="leaflet-map-popup" class="leaflet-map"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Markers with Custom Icons</h4>
                    <div id="leaflet-map-custom-icons" class="leaflet-map"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Interactive Choropleth Map</h4>

                    <div id="leaflet-map-interactive-map" class="leaflet-map"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Layer Groups and Layers Control</h4>
                    <div id="leaflet-map-group-control" class="leaflet-map"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- leaflet plugin -->
    <script src="{{ URL::asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>

    <!-- leaflet map.init -->
    <script src="{{ URL::asset('/assets/js/pages/leaflet-us-states.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/leaflet-map.init.js') }}"></script>
@endsection
