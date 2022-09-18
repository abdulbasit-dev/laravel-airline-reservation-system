@extends('layouts.master')

@section('title') @lang('translation.Toast_UI_Charts') @endsection

@section('css')
<!-- tui charts Css -->
<link href="{{ URL::asset('/assets/libs/tui-chart/tui-chart.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Charts @endslot
@slot('title') Toast UI Charts @endslot
@endcomponent

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Bar charts</h4>

                <div id="bar-charts" dir="ltr"></div>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Column charts</h4>

                <div id="column-charts" dir="ltr"></div>

            </div>
        </div>
    </div> <!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Line charts</h4>

                <div id="line-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Area charts</h4>

                <div id="area-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Bubble charts</h4>

                <div id="bubble-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Scatter charts</h4>

                <div id="scatter-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Pie charts</h4>

                <div id="pie-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Donut pie charts</h4>

                <div id="donut-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Heatmap charts</h4>

                <div id="heatmap-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Treemap charts</h4>

                <div id="treemap-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Map charts</h4>

                <div id="map-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Boxplot charts</h4>

                <div id="boxplot-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->

</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Bullet charts</h4>

                <div id="bullet-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Radial charts</h4>

                <div id="radial-charts" dir="ltr"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
@section('script')
<!-- tui charts plugins -->

<script src="{{ URL::asset('/assets/libs/tui-chart/tui-chart-all.min.js') }}"></script>

<!-- tui charts map -->
<script src="{{ URL::asset('/assets/libs/tui-chart/maps/usa.js') }}"></script>

<!-- tui charts plugins -->
<script src="{{ URL::asset('/assets/js/pages/tui-charts.init.js') }}"></script>

@endsection