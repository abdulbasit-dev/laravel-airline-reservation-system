@extends('layouts.master')

@section('title') @lang('translation.Form_Advanced') @endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') Form Advanced @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Select2</h4>
                    <p class="card-title-desc">A mobile and touch friendly input spinner component for
                        Bootstrap</p>

                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Single Select</label>
                                    <select class="form-control select2">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Multiple Select</label>

                                    <select class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Choose ...">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>

                                </div>

                                <div>
                                    <label class="form-label">Search Disable</label>
                                    <select class="form-control select2-search-disable">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Ajax (remote data)</label>
                                    <select class="form-control select2-ajax"></select>

                                </div>
                                <div class="templating-select">
                                    <label class="form-label">Templating</label>
                                    <select class="form-control select2-templating">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                    </select>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Colorpicker</h4>
                    <p class="card-title-desc">Examples of Spectrum Colorpicker.</p>

                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label">Simple input field</label>
                            <input type="text" class="form-control" id="colorpicker-default" value="#50a5f1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Show Alpha</label>
                            <input type="text" class="form-control" id="colorpicker-showalpha"
                                value="rgba(244, 106, 106, 0.6)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Show Palette Only</label>
                            <input type="text" class="form-control" id="colorpicker-showpaletteonly" value="#34c38f">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Toggle Palette Only</label>
                            <input type="text" class="form-control" id="colorpicker-togglepaletteonly" value="#50a5f1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Show Initial</label>
                            <input type="text" class="form-control" id="colorpicker-showintial" value="#f1b44c">
                        </div>
                        <div>
                            <label class="form-label">Show Input And Initial</label>
                            <input type="text" class="form-control" id="colorpicker-showinput-intial" value="#f46a6a">
                        </div>

                    </form>

                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Timepicker</h4>
                    <p class="card-title-desc">Easily select a time for a text input using your mouse or
                        keyboards arrow keys.</p>

                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label">Default Time Picker</label>

                            <div class="input-group" id="timepicker-input-group1">
                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker">

                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">24 Hour Mode Time Picker</label>

                            <div class="input-group" id="timepicker-input-group2">
                                <input id="timepicker2" type="text" class="form-control" data-provide="timepicker">

                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>

                        </div>

                        <div>
                            <label class="form-label">Specify a step for the minute field</label>

                            <div class="input-group" id="timepicker-input-group3">
                                <input id="timepicker3" type="text" class="form-control" data-provide="timepicker">

                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap Datepicker</h4>
                    <p class="card-title-desc">Examples of twitter bootstrap datepicker.</p>

                    <form action="#">
                        <div class="mb-4">
                            <label>Default Functionality</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                    data-provide="datepicker">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-4">
                            <label>Auto Close</label>
                            <div class="input-group" id="datepicker2">
                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                    data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                    data-provide="datepicker" data-date-autoclose="true">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-4">
                            <label>Multiple Date</label>
                            <div class="input-group" id="datepicker3">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" data-provide="datepicker"
                                    data-date-container='#datepicker3' data-date-format="dd M, yyyy"
                                    data-date-multidate="true">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>

                        <div class="mb-4">
                            <label>Month View</label>
                            <div class="position-relative" id="datepicker4">
                                <input type="text" class="form-control" data-date-container='#datepicker4'
                                    data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1">
                            </div>

                        </div>

                        <div class="mb-4">
                            <label>Year View</label>
                            <div class="position-relative" id="datepicker5">
                                <input type="text" class="form-control" data-provide="datepicker"
                                    data-date-container='#datepicker5' data-date-format="dd M, yyyy"
                                    data-date-min-view-mode="2">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label>Date Range</label>

                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                <input type="text" class="form-control" name="start" placeholder="Start Date" />
                                <input type="text" class="form-control" name="end" placeholder="End Date" />
                            </div>
                        </div>

                        <div>
                            <label>Inline Datepicker</label>

                            <div data-provide="datepicker-inline" class="bootstrap-datepicker-inline"></div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap MaxLength</h4>
                    <p class="card-title-desc">This plugin integrates by default with
                        Twitter bootstrap using badges to display the maximum lenght of the
                        field where the user is inserting text. </p>

                    <div>
                        <label class="mb-1">Default usage</label>
                        <p class="text-muted mb-2">
                            The badge will show up by default when the remaining chars are 10 or less:
                        </p>
                        <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" />
                    </div>

                    <div class="mt-3">
                        <label class="mb-1">Threshold value</label>
                        <p class="text-muted mb-2">
                            Do you want the badge to show up when there are 20 chars or less? Use the
                            <code>threshold</code> option:
                        </p>
                        <input type="text" maxlength="25" name="thresholdconfig" class="form-control"
                            id="thresholdconfig" />
                    </div>

                    <div class="mt-3">
                        <label class="mb-1">All the options</label>
                        <p class="text-muted mb-2">
                            Please note: if the <code>alwaysShow</code> option is enabled, the
                            <code>threshold</code> option is ignored.
                        </p>
                        <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />
                    </div>

                    <div class="mt-3">
                        <label class="mb-1">Position</label>
                        <p class="text-muted mb-2">
                            All you need to do is specify the <code>placement</code> option, with one of
                            those strings. If none
                            is specified, the positioning will be defauted to 'bottom'.
                        </p>
                        <input type="text" class="form-control" maxlength="25" name="placement" id="placement" />
                    </div>

                    <div class="mt-3">
                        <label class="mb-1">Textareas</label>
                        <p class="text-muted mb-2">
                            Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                        </p>
                        <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                            placeholder="This textarea has a limit of 225 chars."></textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bootstrap TouchSpin</h4>
                    <p class="card-title-desc">A mobile and touch friendly input spinner component for
                        Bootstrap</p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Using data attributes</label>
                            <input data-toggle="touchspin" type="text" value="55">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Example with postfix (large)</label>
                            <input data-toggle="touchspin" value="18.20" type="text" data-step="0.1" data-decimals="2"
                                data-bts-postfix="%">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">With prefix </label>
                            <input data-toggle="touchspin" type="text" data-bts-prefix="$">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Init with empty value:</label>
                            <input data-toggle="touchspin" type="text">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value attribute is not set (applying
                                settings.initval)</label>
                            <input id="demo3_21" type="text" value="" name="demo3_21">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value is set explicitly to 33 (skipping
                                settings.initval) </label>
                            <input id="demo3_22" type="text" value="33" name="demo3_22">
                        </div>
                        <div>
                            <label class="form-label">Vertical button alignment:</label>
                            <input id="demo_vertical" type="text" value="" name="demo_vertical">
                        </div>
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

                    <h4 class="card-title">Css Switch</h4>
                    <p class="card-title-desc">Here are a few types of switches. </p>

                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="font-size-14 mb-3">Example switch</h5>
                            <div>
                                <input type="checkbox" id="switch1" switch="none" checked />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>

                                <input type="checkbox" id="switch2" switch="default" checked />
                                <label for="switch2" data-on-label="" data-off-label=""></label>

                                <input type="checkbox" id="switch3" switch="bool" checked />
                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch6" switch="primary" checked />
                                <label for="switch6" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch4" switch="success" checked />
                                <label for="switch4" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch7" switch="info" checked />
                                <label for="switch7" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch5" switch="warning" checked />
                                <label for="switch5" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch8" switch="danger" checked />
                                <label for="switch8" data-on-label="Yes" data-off-label="No"></label>

                                <input type="checkbox" id="switch9" switch="dark" checked />
                                <label for="switch9" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-4 mt-lg-0">
                                <h5 class="font-size-14 mb-3">Square switch</h5>
                                <div class="d-flex">
                                    <div class="square-switch">
                                        <input type="checkbox" id="square-switch1" switch="none" checked />
                                        <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                    <div class="square-switch">
                                        <input type="checkbox" id="square-switch2" switch="info" checked />
                                        <label for="square-switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="square-switch">
                                        <input type="checkbox" id="square-switch3" switch="bool" checked />
                                        <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Datepicker</h4>
                    <div class="row">
                        <div class="col-xl-3">
                            <div>
                                <h4 class="font-size-14 mb-3">Demo</h4>
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date"
                                            placeholder="Pick a date" autocomplete="off">
                                        <button type="button" class="btn btn-secondary docs-datepicker-trigger" disabled>
                                            <i class="mdi mdi-calendar" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="docs-datepicker-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="mt-4 mt-xl-0">
                                <h4 class="font-size-14 mb-3">Options</h4>
                                <div class="docs-options">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-date">date</span>
                                        <input type="text" class="form-control" name="date" value
                                            aria-describedby="option-date" placeholder="null">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-format">format</span>
                                        <input type="text" class="form-control" name="format" value="mm/dd/yyyy"
                                            aria-describedby="option-format" placeholder="mm/dd/yyyy">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-startDate">startDate</span>
                                        <input type="text" class="form-control" name="startDate"
                                            aria-describedby="option-startDate" placeholder="null">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-endDate">endDate</span>
                                        <input type="text" class="form-control" name="endDate"
                                            aria-describedby="option-endDate" placeholder="null">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-startView">startView</span>
                                        <select class="form-control" id="option-startView" name="startView">
                                            <option value="0" selected>0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-weekStart">weekStart</span>
                                        <select class="form-control" id="option-weekStart" name="weekStart">
                                            <option value="0" selected>0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-offset">offset</span>
                                        <input type="number" class="form-control" name="offset" value="10"
                                            aria-describedby="option-offset" placeholder="offset">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-zIndex">zIndex</span>
                                        <input type="number" class="form-control" name="zIndex" value="1000"
                                            aria-describedby="option-zIndex" placeholder="zIndex">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="mt-4 mt-xl-0">
                                <h4 class="font-size-14 mb-3">Toggles</h4>
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="container" type="checkbox"
                                                    name="container">
                                                <label class="form-check-label" for="container">container</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="trigger" type="checkbox" name="trigger">
                                                <label class="form-check-label" for="trigger">trigger</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="inline" type="checkbox" name="inline">
                                                <label class="form-check-label" for="inline">inline</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="autoShow" type="checkbox"
                                                    name="autoShow">
                                                <label class="form-check-label" for="autoShow">autoShow</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="autoHide" type="checkbox"
                                                    name="autoHide">
                                                <label class="form-check-label" for="autoHide">autoHide</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="autoPick" type="checkbox"
                                                    name="autoPick">
                                                <label class="form-check-label" for="autoPick">autoPick</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" id="yearFirst" type="checkbox"
                                                    name="yearFirst">
                                                <label class="form-check-label" for="yearFirst">yearFirst</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="mt-4 mt-xl-0">
                                <h4 class="font-size-14 mb-3">Methods</h4>
                                <div class="docs-actions">
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-method="getDate"
                                            data-target="#putDate">Get
                                            Date</button>
                                        <input type="text" class="form-control" id="putDate">
                                    </div>
                                    <div class="input-group mb-3">

                                        <button type="button" class="btn btn-primary" data-arguments="[true]"
                                            data-method="getDate" data-target="#putDateFormatted">Get Date
                                            (formatted)</button>
                                        <input type="text" class="form-control" id="putDateFormatted">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-method="getMonthName"
                                            data-target="#putMonthName">Get
                                            Month Name</button>

                                        <input type="text" class="form-control" id="putMonthName">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-arguments="[true]"
                                            data-method="getMonthName" data-target="#putMonthNameShort">Get Month Name
                                            (short)</button>
                                        <input type="text" class="form-control" id="putMonthNameShort">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-method="getDayName"
                                            data-target="#putDayName">Get Day
                                            Name</button>
                                        <input type="text" class="form-control" id="putDayName">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-arguments="[true]"
                                            data-method="getDayName" data-target="#putDayNameShort">Get Day Name
                                            (short)</button>
                                        <input type="text" class="form-control" id="putDayNameShort">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" data-arguments="[false, true]"
                                            data-method="getDayName" data-target="#putDayNameMin">Get Day Name
                                            (min)</button>
                                        <input type="text" class="form-control" id="putDayNameMin">
                                    </div>
                                    <div class="btn-group mb-3 d-flex" role="group">
                                        <button type="button" class="btn btn-primary" data-method="show">Show</button>
                                        <button type="button" class="btn btn-primary" data-method="hide">Hide</button>
                                    </div>
                                    <div class="btn-group mb-3 d-flex" role="group">
                                        <button type="button" class="btn btn-primary" data-method="pick">Pick</button>
                                        <button type="button" class="btn btn-primary" data-method="update">Update</button>
                                    </div>
                                    <div class="btn-group mb-3 d-flex" role="group">
                                        <button type="button" class="btn btn-primary" data-method="reset">Reset</button>
                                        <button type="button" class="btn btn-primary" data-method="destroy">Destroy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
