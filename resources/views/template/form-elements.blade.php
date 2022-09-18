@extends('layouts.master')

@section('title') @lang('translation.Form_Elements') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Forms @endslot
@slot('title') Form Elements @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Textual inputs</h4>
                <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to
                    each
                    textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Text</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Search</label>
                    <div class="col-md-10">
                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" type="email" value="bootstrap@example.com" placeholder="Enter Email" id="example-email-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-url-input" class="col-md-2 col-form-label">URL</label>
                    <div class="col-md-10">
                        <input class="form-control" type="url" value="https://getbootstrap.com" placeholder="Enter URL" id="example-url-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                    <div class="col-md-10">
                        <input class="form-control" type="tel" value="1-(555)-555-5555" placeholder="Enter Telephone" id="example-tel-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" value="hunter2" placeholder="Enter Password" id="example-password-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-number-input" class="col-md-2 col-form-label">Number</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" value="42" placeholder="Enter Number" id="example-number-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Date and
                        Time</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                    <div class="col-md-10">
                        <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-month-input" class="col-md-2 col-form-label">Month</label>
                    <div class="col-md-10">
                        <input class="form-control" type="month" value="2019-08" id="example-month-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-week-input" class="col-md-2 col-form-label">Week</label>
                    <div class="col-md-10">
                        <input class="form-control" type="week" value="2019-W33" id="example-week-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-time-input" class="col-md-2 col-form-label">Time</label>
                    <div class="col-md-10">
                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-color-input" class="col-md-2 col-form-label">Color</label>
                    <div class="col-md-10">
                        <input class="form-control form-control-color mw-100" type="color" value="#556ee6" id="example-color-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Select</label>
                    <div class="col-md-10">
                        <select class="form-select">
                            <option>Select</option>
                            <option>Large select</option>
                            <option>Small select</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="exampleDataList" class="col-md-2 col-form-label">Datalists</label>
                    <div class="col-md-10">
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="San Francisco">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code>
                    and <code>.form-control-sm</code>.</p>
                <div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="form-label">Default input</label>
                                <input class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-4">
                                <label class="form-label">Small Input</label>
                                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-4">
                                <label class="form-label">Large Input</label>
                                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
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
                <h4 class="card-title">Range Inputs</h4>
                <p class="card-title-desc">Create custom <code>&lt;input type="range"&gt;</code>
                    controls with <code>.form-range</code>.</p>

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="customRange1" class="form-label">Example Range</label>
                            <input type="range" class="form-range" id="customRange1">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="disabledRange" class="form-label">Disabled Eange</label>
                            <input type="range" class="form-range" id="disabledRange" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="mt-4">
                            <h5 class="font-size-14">Min and max</h5>
                            <p class="card-title-desc">Range inputs have implicit values for min and
                                max—0 and 100, respectively.</p>
                            <input type="range" class="form-range" min="0" max="5" id="customRange2">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-4">
                            <h5 class="font-size-14">Steps</h5>
                            <p class="card-title-desc">By default, range inputs “snap” to integer
                                values. To change this, you can specify a <code>step</code> value.</p>
                            <input type="range" class="form-range" min="0" max="5" id="customRange2">
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
                <h4 class="card-title">Checkboxes</h4>

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form
                                Checkboxes
                            </h5>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="formCheck1">
                                <label class="form-check-label" for="formCheck1">
                                    Form Checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck2" checked>
                                <label class="form-check-label" for="formCheck2">
                                    Form Checkbox checked
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form
                                Checkboxes
                                Right</h5>
                            <div>
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckRight1">
                                    <label class="form-check-label" for="formCheckRight1">
                                        Form Checkbox Right
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" type="checkbox" id="formCheckRight2" checked>
                                    <label class="form-check-label" for="formCheckRight2">
                                        Form Checkbox Right checked
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form
                                Checkboxes
                                colors</h5>
                            <p class="sub-header mb-4">Add class <code>.form-check-* </code> for a color
                                Checkboxes</p>

                            <div>
                                <div class="form-check form-check-primary mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor1" checked>
                                    <label class="form-check-label" for="formCheckcolor1">
                                        Checkbox Primary
                                    </label>
                                </div>

                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                    <label class="form-check-label" for="formCheckcolor2">
                                        Checkbox Success
                                    </label>
                                </div>

                                <div class="form-check form-check-info mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor3" checked>
                                    <label class="form-check-label" for="formCheckcolor3">
                                        Checkbox Info
                                    </label>
                                </div>

                                <div class="form-check form-check-warning mb-3">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor4" checked>
                                    <label class="form-check-label" for="formCheckcolor4">
                                        Checkbox Warning
                                    </label>
                                </div>

                                <div class="form-check form-check-danger">
                                    <input class="form-check-input" type="checkbox" id="formCheckcolor5" checked>
                                    <label class="form-check-label" for="formCheckcolor5">
                                        Checkbox Danger
                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form
                                Checkboxes
                                Outline</h5>
                            <p class="sub-header mb-4">Add class <code>.form-checkbox-outline</code> &
                                <code>.form-check-* </code> for a color Checkboxes
                            </p>

                            <div>
                                <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                    <input class="form-check-input" type="checkbox" id="customCheckcolor1" checked>
                                    <label class="form-check-label" for="customCheckcolor1">
                                        Checkbox Outline Primary
                                    </label>
                                </div>

                                <div class="form-check form-checkbox-outline form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" id="customCheckcolor2" checked>
                                    <label class="form-check-label" for="customCheckcolor2">
                                        Checkbox Outline Success
                                    </label>
                                </div>

                                <div class="form-check form-checkbox-outline form-check-info mb-3">
                                    <input class="form-check-input" type="checkbox" id="customCheckcolor3" checked>
                                    <label class="form-check-label" for="customCheckcolor3">
                                        Checkbox Outline Info
                                    </label>
                                </div>

                                <div class="form-check form-checkbox-outline form-check-warning mb-3">
                                    <input class="form-check-input" type="checkbox" id="customCheckcolor4" checked>
                                    <label class="form-check-label" for="customCheckcolor4">
                                        Checkbox Outline Warning
                                    </label>
                                </div>

                                <div class="form-check form-checkbox-outline form-check-danger">
                                    <input class="form-check-input" type="checkbox" id="customCheckcolor5" checked>
                                    <label class="form-check-label" for="customCheckcolor5">
                                        Checkbox Outline Danger
                                    </label>
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
                <h4 class="card-title">Radios</h4>

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-4">Form Radios</h5>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                <label class="form-check-label" for="formRadios1">
                                    Form Radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                <label class="form-check-label" for="formRadios2">
                                    Form Radio checked
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-4">Form Radios Right</h5>
                            <div>
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight1" checked>
                                    <label class="form-check-label" for="formRadiosRight1">
                                        Form Radio Right
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight2">
                                    <label class="form-check-label" for="formRadiosRight2">
                                        Form Radio Right checked
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form Radio
                                colors</h5>
                            <p class="sub-header mb-4">Add class <code>.form-radio-* </code> for a
                                color Radios</p>


                            <div>
                                <div class="form-check form-radio-primary mb-3">
                                    <input class="form-check-input" type="radio" name="formRadioColor1" id="formRadioColor1" checked>
                                    <label class="form-check-label" for="formRadioColor1">
                                        Radio Primary
                                    </label>
                                </div>

                                <div class="form-check form-radio-success mb-3">
                                    <input class="form-check-input" type="radio" name="formRadioColor2" id="formRadioColor2" checked>
                                    <label class="form-check-label" for="formRadioColor2">
                                        Radio Success
                                    </label>
                                </div>

                                <div class="form-check form-radio-info mb-3">
                                    <input class="form-check-input" type="radio" name="formRadioColor3" id="formRadioColor3" checked>
                                    <label class="form-check-label" for="formRadioColor3">
                                        Radio Info
                                    </label>
                                </div>

                                <div class="form-check form-radio-warning mb-3">
                                    <input class="form-check-input" type="radio" name="formRadioColor4" id="formRadioColor4" checked>
                                    <label class="form-check-label" for="formRadioColor4">
                                        Radio warning
                                    </label>
                                </div>

                                <div class="form-check form-radio-danger mb-3">
                                    <input class="form-check-input" type="radio" name="formRadioColor5" id="formRadioColor5" checked>
                                    <label class="form-check-label" for="formRadioColor5">
                                        Radio Danger
                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="mdi mdi-arrow-right text-primary mr-1"></i> Form Radio
                                Outline</h5>
                            <p class="sub-header mb-4">Add class <code>form-radio-outline</code> &
                                <code>.form-radio-* </code> for a color Checkboxes
                            </p>

                            <div>
                                <div class="form-check form-radio-outline form-radio-primary mb-3">
                                    <input class="form-check-input" type="radio" name="formRadio1" id="formRadio1" checked>
                                    <label class="form-check-label" for="formRadio1">
                                        Radio Outline Primary
                                    </label>
                                </div>
                                <div class="form-check form-radio-outline form-radio-success mb-3">
                                    <input class="form-check-input" type="radio" name="formRadio2" id="formRadio2" checked>
                                    <label class="form-check-label" for="formRadio2">
                                        Radio Outline Success
                                    </label>
                                </div>
                                <div class="form-check form-radio-outline form-radio-info mb-3">
                                    <input class="form-check-input" type="radio" name="formRadio3" id="formRadio3" checked>
                                    <label class="form-check-label" for="formRadio3">
                                        Radio Outline Info
                                    </label>
                                </div>
                                <div class="form-check form-radio-outline form-radio-warning mb-3">
                                    <input class="form-check-input" type="radio" name="formRadio4" id="formRadio4" checked>
                                    <label class="form-check-label" for="formRadio4">
                                        Radio Outline Warning
                                    </label>
                                </div>
                                <div class="form-check form-radio-outline form-radio-danger mb-3">
                                    <input class="form-check-input" type="radio" name="formRadio5" id="formRadio5" checked>
                                    <label class="form-check-label" for="formRadio5">
                                        Radio Outline Danger
                                    </label>
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
                <h4 class="card-title">Switches</h4>
                <p class="card-title-desc">A switch has the markup of a custom checkbox but uses the
                    <code>.form-switch</code> class to render a toggle switch. Switches also support the
                    <code>disabled</code> attribute.
                </p>

                <div class="row">

                    <div class="col-sm-6">
                        <div>
                            <h5 class="font-size-14 mb-3">Switch examples</h5>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked
                                    switch checkbox input</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <h5 class="font-size-14 mb-3">Switch sizes</h5>

                            <div class="form-check form-switch mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizesm" checked>
                                <label class="form-check-label" for="SwitchCheckSizesm">Small Size Switch</label>
                            </div>

                            <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                                <label class="form-check-label" for="SwitchCheckSizemd">Medium Size Switch</label>
                            </div>

                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked>
                                <label class="form-check-label" for="SwitchCheckSizelg">Large Size Switch</label>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">File browser</h4>

                <div>
                    <h5 class="font-size-14"><i class="mdi mdi-arrow-right text-primary"></i> Default file input</h5>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="mt-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-4">
                                <div>
                                    <label for="formFileSm" class="form-label">Small file input example</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="mt-4">
                                <div>
                                    <label for="formFileLg" class="form-label">Large file input example</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file">
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>

                <div class="mt-4 pt-2">
                    <h5 class="font-size-14 mb-0"><i class="mdi mdi-arrow-right text-primary"></i> Custom file input
                    </h5>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mt-4">

                            <div>
                                <label class="form-label">With Label</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                    <input type="file" class="form-control" id="inputGroupFile01">
                                </div>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mt-4">

                            <div>
                                <label class="form-label">With Button</label>
                                <div class="input-group mb-3">
                                    <button class="btn btn-primary" type="button" id="inputGroupFileAddon03">Button</button>
                                    <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                </div>

                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-primary" type="button" id="inputGroupFileAddon04">Button</button>
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