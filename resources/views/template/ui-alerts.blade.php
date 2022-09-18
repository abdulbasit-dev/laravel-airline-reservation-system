@extends('layouts.master')

@section('title') @lang('translation.Alerts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Alerts @endslot
@endcomponent

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Default Alerts</h4>
                <p class="card-title-desc">Alerts are available for any length of
                    text, as well as an optional dismiss button. For proper styling, use one
                    of the four <strong>required</strong> contextual classes (e.g., <code>.alert-success</code>). For inline
                    dismissal, use the alerts jQuery plugin.</p>

                <div class="">
                    <div class="alert alert-primary" role="alert">
                        A simple primary alert—check it out!
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        A simple secondary alert—check it out!
                    </div>
                    <div class="alert alert-success" role="alert">
                        A simple success alert—check it out!
                    </div>
                    <div class="alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                    </div>
                    <div class="alert alert-warning" role="alert">
                        A simple warning alert—check it out!
                    </div>
                    <div class="alert alert-info mb-0" role="alert">
                        A simple info alert—check it out!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Link color</h4>
                <p class="card-title-desc">Use the <code>.alert-link</code> utility class to
                    quickly provide matching colored links within any alert.</p>

                <div class="">
                    <div class="alert alert-primary" role="alert">
                        A simple primary alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        A simple secondary alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <div class="alert alert-success" role="alert">
                        A simple success alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <div class="alert alert-danger" role="alert">
                        A simple danger alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <div class="alert alert-warning" role="alert">
                        A simple warning alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <div class="alert alert-info mb-0" role="alert">
                        A simple info alert with <a href="javascript: void(0);" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Dismissing</h4>
                <p class="card-title-desc">
                    Add a dismiss button and the <code>.alert-dismissible</code> class, which adds extra padding
                    to the right of the alert and positions the <code>.btn-close</code> button.
                </p>

                <div class="">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        A simple primary alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        A simple secondary alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        A simple success alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        A simple danger alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        A simple warning alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
                        A simple info alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">With Icon</h4>


                <div class="">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                        A simple primary alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-grease-pencil me-2"></i>
                        A simple secondary alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        A simple success alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        A simple danger alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-alert-outline me-2"></i>
                        A simple warning alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
                        <i class="mdi mdi-alert-circle-outline me-2"></i>
                        A simple info alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Live Example</h4>
                <p class="card-title-desc">Click the button below to show an alert (hidden with inline styles to start), then dismiss (and destroy) it with the built-in close button.</p>

                <div class="">
                    <div id="liveAlertPlaceholder"></div>
                    <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Additional content</h4>
                <p class="card-title-desc">Alerts can also contain additional HTML elements like headings, paragraphs and dividers.</p>

                <div class="">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so
                            that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

@endsection