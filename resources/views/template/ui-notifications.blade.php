@extends('layouts.master')

@section('title') @lang('translation.Notifications') @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Notifications @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notifications</h4>
                <p class="card-title-desc">Toasts are lightweight notifications designed to mimic the push notifications</p>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="control-group">
                            <div class="controls">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input id="title" type="text" class="input-large form-control" placeholder="Enter a title ..." />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="input-large form-control" id="message" rows="3" placeholder="Enter a message ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="control-group my-4">

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="closeButton">
                                <label class="form-check-label" for="closeButton">
                                    Close Button
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="addBehaviorOnToastClick">
                                <label class="form-check-label" for="addBehaviorOnToastClick">
                                    Add behavior on toast click
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="debugInfo">
                                <label class="form-check-label" for="debugInfo">
                                    Debug
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="progressBar">
                                <label class="form-check-label" for="progressBar">
                                    Progress Bar
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="preventDuplicates">
                                <label class="form-check-label" for="preventDuplicates">
                                    Prevent Duplicates
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="addClear">
                                <label class="form-check-label" for="addClear">
                                    Add button to force clearing a toast, ignoring focus
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="checked" id="newestOnTop">
                                <label class="form-check-label" for="newestOnTop">
                                    Newest on top
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-2">
                        <div class="control-group" id="toastTypeGroup">
                            <div class="controls mb-4">
                                <label class="text-muted">Toast Type</label>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="toast-type-radio" id="toast-type-radio1" value="success" checked>
                                    <label class="form-check-label" for="toast-type-radio1">
                                        Success
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="toast-type-radio" id="toast-type-radio2" value="info">
                                    <label class="form-check-label" for="toast-type-radio2">
                                        Info
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="toast-type-radio" id="toast-type-radio3" value="warning">
                                    <label class="form-check-label" for="toast-type-radio3">
                                        Warning
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="toast-type-radio" id="toast-type-radio4" value="error">
                                    <label class="form-check-label" for="toast-type-radio4">
                                        Error
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="control-group" id="positionGroup">
                            <div class="controls mb-4">
                                <label class="text-muted">Position</label>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio1" value="toast-top-right" checked>
                                    <label class="form-check-label" for="positions-radio1">
                                        Top Right
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio2" value="toast-bottom-right">
                                    <label class="form-check-label" for="positions-radio2">
                                        Bottom Right
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio3" value="toast-bottom-left">
                                    <label class="form-check-label" for="positions-radio3">
                                        Bottom Left
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio4" value="toast-top-left">
                                    <label class="form-check-label" for="positions-radio4">
                                        Top Left
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio5" value="toast-top-full-width">
                                    <label class="form-check-label" for="positions-radio5">
                                        Top Full Width
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio6" value="toast-bottom-full-width">
                                    <label class="form-check-label" for="positions-radio6">
                                        Bottom Full Width
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio7" value="toast-top-center">
                                    <label class="form-check-label" for="positions-radio7">
                                        Top Center
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="positions-radio" id="positions-radio8" value="toast-bottom-center">
                                    <label class="form-check-label" for="positions-radio8">
                                        Bottom Center
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="control-group">
                            <div class="controls">
                                <div class="mb-3">
                                    <label for="showEasing" class="form-label">Show Easing</label>
                                    <input id="showEasing" type="text" placeholder="swing, linear" class="input-mini form-control" value="swing" />
                                </div>
                                <div class="mb-3">
                                    <label for="hideEasing" class="form-label">Hide Easing</label>
                                    <input id="hideEasing" type="text" placeholder="swing, linear" class="input-mini form-control" value="linear" />
                                </div>
                                <div class="mb-3">
                                    <label for="showMethod" class="form-label">Show Method</label>
                                    <input id="showMethod" type="text" placeholder="show, fadeIn, slideDown" class="input-mini form-control" value="fadeIn" />
                                </div>
                                <div class="mb-3">
                                    <label for="hideMethod" class="form-label">Hide Method</label>
                                    <input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp" class="input-mini form-control" value="fadeOut" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="control-group">
                            <div class="controls">
                                <div class="mb-3">
                                    <label for="showDuration" class="form-label">Show Duration</label>
                                    <input id="showDuration" type="text" placeholder="ms" class="input-mini form-control" value="300" />
                                </div>
                                <div class="mb-3">
                                    <label for="hideDuration" class="form-label">Hide Duration</label>
                                    <input id="hideDuration" type="text" placeholder="ms" class="input-mini form-control" value="1000" />
                                </div>
                                <div class="mb-3">
                                    <label for="timeOut" class="form-label">Time out</label>
                                    <input id="timeOut" type="text" placeholder="ms" class="input-mini form-control" value="5000" />
                                </div>
                                <div class="mb-3">
                                    <label for="extendedTimeOut" class="form-label">Extended time out</label>
                                    <input id="extendedTimeOut" type="text" placeholder="ms" class="input-mini form-control" value="1000" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button>
                            <button type="button" class="btn btn-danger" id="cleartoasts">Clear Toasts</button>
                            <button type="button" class="btn btn-danger" id="clearlasttoast">Clear Last Toast</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <pre id='toastrOptions' class="toastr-options"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- toastr plugin -->
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>

<!-- toastr init -->
<script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
@endsection