@extends('layouts.master')

@section('title') @lang('translation.Form_Wizard') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Forms @endslot
@slot('title') Form Wizard @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Basic Wizard</h4>

                <div id="basic-example">
                    <!-- Seller Details -->
                    <h3>Seller Details</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">First name</label>
                                        <input type="text" class="form-control" id="basicpill-firstname-input" placeholder="Enter Your First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input">Last name</label>
                                        <input type="text" class="form-control" id="basicpill-lastname-input" placeholder="Enter Your Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input">Phone</label>
                                        <input type="text" class="form-control" id="basicpill-phoneno-input" placeholder="Enter Your Phone No.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-email-input">Email</label>
                                        <input type="email" class="form-control" id="basicpill-email-input" placeholder="Enter Your Email ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="basicpill-address-input">Address</label>
                                        <textarea id="basicpill-address-input" class="form-control" rows="2" placeholder="Enter Your Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Company Document -->
                    <h3>Company Document</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-pancard-input">PAN Card</label>
                                        <input type="text" class="form-control" id="basicpill-pancard-input" placeholder="Enter Your PAN No.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-vatno-input">VAT/TIN No.</label>
                                        <input type="text" class="form-control" id="basicpill-vatno-input" placeholder="Enter Your VAT/TIN No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-cstno-input">CST No.</label>
                                        <input type="text" class="form-control" id="basicpill-cstno-input" placeholder="Enter Your CST No.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-servicetax-input">Service Tax No.</label>
                                        <input type="text" class="form-control" id="basicpill-servicetax-input" placeholder="Enter Your Service Tax No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-companyuin-input">Company UIN</label>
                                        <input type="text" class="form-control" id="basicpill-companyuin-input" placeholder="Enter Your Company UIN">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-declaration-input">Declaration</label>
                                        <input type="text" class="form-control" id="basicpill-Declaration-input" placeholder="Declaration Details">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                    <h3>Bank Details</h3>
                    <section>
                        <div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-namecard-input">Name on Card</label>
                                            <input type="text" class="form-control" id="basicpill-namecard-input" placeholder="Enter Your Name on Card">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>Credit Card Type</label>
                                            <select class="form-select">
                                                <option selected>Select Card Type</option>
                                                <option value="AE">American Express</option>
                                                <option value="VI">Visa</option>
                                                <option value="MC">MasterCard</option>
                                                <option value="DI">Discover</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cardno-input">Credit Card Number</label>
                                            <input type="text" class="form-control" id="basicpill-cardno-input" placeholder="Credit Card Number">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-card-verification-input">Card Verification Number</label>
                                            <input type="text" class="form-control" id="basicpill-card-verification-input" placeholder="Credit Verification Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-expiration-input">Expiration Date</label>
                                            <input type="text" class="form-control" id="basicpill-expiration-input" placeholder="Card Expiration Date">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </section>

                    <!-- Confirm Details -->
                    <h3>Confirm Detail</h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Vertical Wizard</h4>

                <div id="vertical-example" class="vertical-wizard">
                    <!-- Seller Details -->
                    <h3>Seller Details</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">First name</label>
                                        <input type="text" class="form-control" id="verticalnav-firstname-input" placeholder="Enter Your First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Last name</label>
                                        <input type="text" class="form-control" id="verticalnav-lastname-input" placeholder="Enter Your Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Phone</label>
                                        <input type="text" class="form-control" id="verticalnav-phoneno-input" placeholder="Enter Your Phone No.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Email</label>
                                        <input type="email" class="form-control" id="verticalnav-email-input" placeholder="Enter Your Email ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Address</label>
                                        <textarea id="verticalnav-address-input" class="form-control" rows="2" placeholder="Enter Your Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Company Document -->
                    <h3>Company Document</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-pancard-input">PAN Card</label>
                                        <input type="text" class="form-control" id="verticalnav-pancard-input" placeholder="Enter Your PAN Card No.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-vatno-input">VAT/TIN No.</label>
                                        <input type="text" class="form-control" id="verticalnav-vatno-input" placeholder="Enter Your VAT/TIN No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-cstno-input">CST No.</label>
                                        <input type="text" class="form-control" id="verticalnav-cstno-input" placeholder="Enter Your CST No.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-servicetax-input">Service Tax No.</label>
                                        <input type="text" class="form-control" id="verticalnav-servicetax-input" placeholder="Enter Your Service Tax No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-companyuin-input">Company UIN</label>
                                        <input type="text" class="form-control" id="verticalnav-companyuin-input" placeholder="Company UIN No.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-declaration-input">Declaration</label>
                                        <input type="text" class="form-control" id="verticalnav-Declaration-input" placeholder="Declaration Details">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                    <h3>Bank Details</h3>
                    <section>
                        <div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-namecard-input">Name on Card</label>
                                            <input type="text" class="form-control" id="verticalnav-namecard-input" placeholder="Enter Your Name on Card">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>Credit Card Type</label>
                                            <select class="form-select">
                                                <option selected>Select Card Type</option>
                                                <option value="AE">American Express</option>
                                                <option value="VI">Visa</option>
                                                <option value="MC">MasterCard</option>
                                                <option value="DI">Discover</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-cardno-input">Credit Card Number</label>
                                            <input type="text" class="form-control" id="verticalnav-cardno-input" placeholder="Enter Your Card Number">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Card Verification Number</label>
                                            <input type="text" class="form-control" id="verticalnav-card-verification-input" placeholder="Card Verification Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-expiration-input">Expiration Date</label>
                                            <input type="text" class="form-control" id="verticalnav-expiration-input" placeholder="Card Expiration Date">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </section>

                    <!-- Confirm Details -->
                    <h3>Confirm Detail</h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
<!-- jquery step -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>

<!-- form wizard init -->
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
@endsection