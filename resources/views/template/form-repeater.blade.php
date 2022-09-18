@extends('layouts.master')

@section('title') @lang('translation.Form_Repeater') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Forms @endslot
@slot('title') Form Repeater" @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Example</h4>
                <form class="repeater" enctype="multipart/form-data">
                    <div data-repeater-list="group-a">
                        <div data-repeater-item class="row">
                            <div class="mb-3 col-lg-2">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="untyped-input" class="form-control" placeholder="Enter Your Name" />
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Enter Your Email ID" />
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" class="form-control" placeholder="Enter Your Subject" />
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="resume">Resume</label>
                                <input type="file" class="form-control" id="resume">
                            </div>

                            <div class="mb-3 col-lg-2">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" placeholder="Enter Your Message"></textarea>
                            </div>

                            <div class="col-lg-2 align-self-center">
                                <div class="d-grid">
                                    <input data-repeater-delete type="button" class="btn btn-primary" value="Delete" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Nested</h4>
                <form class="outer-repeater">
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="mb-3">
                                <label for="formname">Name :</label>
                                <input type="text" class="form-control" id="formname" placeholder="Enter your Name...">
                            </div>

                            <div class="mb-3">
                                <label for="formemail">Email :</label>
                                <input type="email" class="form-control" id="formemail" placeholder="Enter your Email...">
                            </div>

                            <div class="inner-repeater mb-4">
                                <div data-repeater-list="inner-group" class="inner mb-3">
                                    <label>Phone no :</label>
                                    <div data-repeater-item class="inner mb-3 row">
                                        <div class="col-md-10 col-8">
                                            <input type="text" class="inner form-control" placeholder="Enter your phone no..." />
                                        </div>
                                        <div class="col-md-2 col-4">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="button" class="btn btn-primary inner" value="Delete" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success inner" value="Add Number" />
                            </div>

                            <div class="mb-3">
                                <label class="d-block mb-3">Gender :</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formmessage">Message :</label>
                                <textarea id="formmessage" class="form-control" rows="3" placeholder="Enter Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- form repeater js -->
<script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-repeater.int.js') }}"></script>
@endsection