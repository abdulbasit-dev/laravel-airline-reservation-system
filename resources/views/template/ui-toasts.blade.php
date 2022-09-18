@extends('layouts.master')

@section('title') @lang('translation.Toasts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Toasts @endslot
@endcomponent

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Live Example</h5>
                <p class="card-title-des">Click the button below to show a toast (positioned with our
                    utilities in the
                    lower right corner) that has been hidden by default.</p>

                <div class="d-flex flex-wrap gap-2">
                    <div>
                        <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

                        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1005">
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="assets/images/logo.svg" alt="" class="me-2" height="18">
                                    <strong class="me-auto">Bootstrap</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                        </div>
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

                <h5 class="card-title">Basic Toast</h5>
                <p class="card-title-desc">Toasts are as flexible as you need and have very little
                    required markup.
                    At a minimum, we require a single element to contain your
                    “toasted” content and strongly encourage a dismiss button.</p>

                <div style="min-height: 110px;">
                    <div class="toast fade show" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true">
                        <div class="toast-header">
                            <img src="assets/images/logo.svg" alt="" class="me-2" height="18">
                            <strong class="me-auto">Skote</strong>
                            <small class="text-muted">11 mins ago</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                    </div>
                </div>
                <!--end toast-->
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Translucent</h5>
                <p class="card-title-desc">Toasts are slightly translucent, too, so they blend over
                    whatever they might appear over. For browsers that
                    support the <code>backdrop-filter</code> CSS property,
                    we’ll also attempt to blur the elements under a toast.</p>

                <div style="min-height: 110px;">
                    <div class="toast fade show" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true">
                        <div class="toast-header">
                            <img src="assets/images/logo.svg" alt="" class="me-2" height="18">
                            <strong class="me-auto">Skote</strong>
                            <small class="text-muted">11 mins ago</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                    </div>
                    <!--end toast-->
                </div>
                <!--end /div-->

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

                <h5 class="card-title">Stacking</h5>
                <p class="card-title-desc">For systems that generate more notifications, consider using
                    a wrapping element
                    so they can easily stack.</p>

                <div style="min-height: 230px;">
                    <div aria-live="polite" aria-atomic="true" class="position-relative">
                        <!-- Position it: -->
                        <!-- - `.toast-container` for spacing between toasts -->
                        <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
                        <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
                        <div class="toast-container position-absolute top-0 end-0 p-2 p-lg-3">

                            <!-- Then put toasts within -->
                            <div class="toast fade show" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="assets/images/logo.svg" alt="" class="me-2" height="18">
                                    <strong class="me-auto">Skote</strong>
                                    <small class="text-muted">just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    See? Just like this.
                                </div>
                            </div>

                            <div class="toast fade show" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="assets/images/logo.svg" alt="" class="me-2" height="18">
                                    <strong class="me-auto">Skote</strong>
                                    <small class="text-muted">2 sec ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Heads up, toasts will stack automatically
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end /div-->
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Custom content</h5>
                <p class="card-title-desc">Customize your toasts by removing sub-components, tweaking them with utilities, or by adding your own markup.</p>

                <div class="d-flex flex-column gap-3">
                    <div aria-live="polite" aria-atomic="true" class="position-relative">
                        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                                <div class="mt-2 pt-2 border-top">
                                    <button type="button" class="btn btn-primary btn-sm">Take
                                        action</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="toast align-items-center fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>

                    <div aria-live="polite" aria-atomic="true">
                        <div class="toast fade show align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end /div-->
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

@endsection