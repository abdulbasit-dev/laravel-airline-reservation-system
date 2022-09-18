@extends('layouts.master')

@section('title') @lang('translation.Lightbox') @endsection

@section('css')
<!-- Lightbox css -->
<link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Lightbox @endslot
@endcomponent


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Single image lightbox</h4>
                <p class="card-title-desc">Three simple popups with different scaling settings.</p>

                <div class="row">
                    <div class="col-6">
                        <div>
                            <h5 class="font-size-14">Fits (Horz/Vert)</h5>
                            <a class="image-popup-vertical-fit" href="assets/images/small/img-2.jpg" title="Caption. Can be aligned it to any side and contain any HTML.">
                                <img class="img-fluid" alt="" src="assets/images/small/img-2.jpg" width="145">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h5 class="font-size-14">Effects</h5>
                            <a class="image-popup-no-margins" href="assets/images/small/img-3.jpg">
                                <img class="img-fluid" alt="" src="assets/images/small/img-3.jpg" width="75">
                            </a>
                            <p class="mt-2 mb-0 text-muted">No gaps, zoom animation, close icon in top-right corner.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Lightbox gallery</h4>
                <p class="card-title-desc">In this example lazy-loading of images is enabled for the next image based on move direction. </p>

                <div class="popup-gallery d-flex flex-wrap">
                    <a href="assets/images/small/img-1.jpg" title="Project 1">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-1.jpg" alt="" width="120">
                        </div>
                    </a>
                    <a href="assets/images/small/img-2.jpg" title="Project 2">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-2.jpg" alt="" width="120">
                        </div>
                    </a>
                    <a href="assets/images/small/img-3.jpg" title="Project 3">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-3.jpg" alt="" width="120">
                        </div>
                    </a>
                    <a href="assets/images/small/img-4.jpg" title="Project 4">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-4.jpg" alt="" width="120">
                        </div>
                    </a>
                    <a href="assets/images/small/img-5.jpg" title="Project 5">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-5.jpg" alt="" width="120">
                        </div>
                    </a>
                    <a href="assets/images/small/img-6.jpg" title="Project 6">
                        <div class="img-fluid">
                            <img src="assets/images/small/img-6.jpg" alt="" width="120">
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Zoom Gallery</h4>
                <p class="card-title-desc">Zoom effect works only with images.</p>

                <div class="zoom-gallery d-flex flex-wrap">
                    <a href="assets/images/small/img-3.jpg" title="Project 1"><img src="assets/images/small/img-3.jpg" alt="" width="275"></a>
                    <a href="assets/images/small/img-7.jpg" title="Project 2"><img src="assets/images/small/img-7.jpg" alt="" width="275"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Popup with video or map</h4>
                <p class="card-title-desc">In this example lazy-loading of images is enabled for the next image based on move direction. </p>

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <a class="popup-youtube btn btn-secondary mo-mb-2" href="https://www.youtube.com/watch?v=0O2aH4XLbto">Open YouTube Video</a>
                            <a class="popup-vimeo btn btn-secondary mo-mb-2" href="https://vimeo.com/45830194">Open Vimeo Video</a>
                            <a class="popup-gmaps btn btn-secondary mo-mb-2" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">Open Google Map</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Popup with Form</h4>
                <div>
                    <a class="popup-form btn btn-primary" href="#test-form">Popup form</a>
                </div>

                <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
                    <div class="card-body">
                        <h4 class="mb-4">Form</h4>
                        <form>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <textarea class="form-control" id="subject" rows="3"></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')
<!-- Magnific Popup-->
<script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

<!-- lightbox init js-->
<script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
@endsection