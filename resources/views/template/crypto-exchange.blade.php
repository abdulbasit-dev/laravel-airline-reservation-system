@extends('layouts.master')

@section('title') @lang('translation.Exchange') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Crypto @endslot
@slot('title') Exchange @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-3">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                    </div>
                    <div class="flex-grow-1 align-self-center">
                        <div class="text-muted">
                            <h5>Henry wells</h5>
                            <p class="mb-1">henrywells@abc.com</p>
                            <p class="mb-0">Id no: #SK0234</p>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-wallet me-1"></i> <span class="d-none d-sm-inline-block">Wallet Balance <i class="mdi mdi-chevron-down"></i></span></button>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                            <div class="dropdown-item-text">
                                <div>
                                    <p class="text-muted mb-2">Available Balance</p>
                                    <h5 class="mb-0">$ 9148.23</h5>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">
                                BTC : <span class="float-end">1.02356</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                ETH : <span class="float-end">0.04121</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                LTC : <span class="float-end">0.00356</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-primary text-center" href="#">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Price</h4>

                <div class="row">
                    <div class="col-xl-3 col-sm-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-22">
                                        <i class="mdi mdi-bitcoin"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">Bitcoin</p>
                                <h5>1.02356 BTC</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="text-muted mb-2">In USD</p>
                            <h5>6310.22 USD</h5>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="text-muted mb-2">Last 24 hrs</p>
                            <h5>0.24 % <i class="mdi mdi-arrow-up text-success"></i></h5>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div id="candlestick-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buy / Sell</h4>

                <div>
                    <p class="text-muted mb-2"><i class="mdi mdi-wallet me-1"></i> Wallet Balance</p>
                    <h5>$ 9148.23</h5>
                </div>

                <div class="mt-4">
                    <ul class="nav nav-pills bg-light rounded" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#buy-tab" role="tab">Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#sell-tab" role="tab">Sell</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="buy-tab" role="tabpanel">

                            <h5 class="font-size-14 mb-4">Buy Coin</h5>

                            <div>
                                <div>
                                    <label>Add Amount :</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Amount</label>
                                        <select class="form-select" style="max-width: 90px;">
                                            <option value="BT" selected>BTC</option>
                                            <option value="ET">ETH</option>
                                            <option value="LT">LTC</option>
                                        </select>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Price</label>
                                        <input type="text" class="form-control" placeholder="Price">
                                        <label class="input-group-text">$</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Total</label>
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-success w-md">Buy Coin</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="sell-tab" role="tabpanel">

                            <h5 class="font-size-14 mb-4">Sell Coin</h5>

                            <div>

                                <div>
                                    <label>Add Amount :</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Amount</label>
                                        <select class="form-select" style="max-width: 90px;">
                                            <option value="BT" selected>BTC</option>
                                            <option value="ET">ETH</option>
                                            <option value="LT">LTC</option>
                                        </select>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Price</label>
                                        <input type="text" class="form-control" placeholder="Price">
                                        <label class="input-group-text">$</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Total</label>

                                        <input type="text" class="form-control" placeholder="Total">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-danger w-md">Sell Coin</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="exchange-tab" role="tabpanel">
                            <div class="float-end ms-2">
                                <h5 class="font-size-14"><i class="bx bx-wallet text-primary font-size-16 align-middle me-1"></i> $4235.23</h5>
                            </div>
                            <h5 class="font-size-14 mb-4">Exchange Coin</h5>

                            <div>

                                <div class="form-group mb-3">
                                    <label>Payment method :</label>
                                    <select class="custom-select">
                                        <option>Credit / Debit Card</option>
                                        <option>Paypal</option>
                                    </select>
                                </div>

                                <div>
                                    <label>Add Amount :</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Amount</label>
                                        </div>
                                        <select class="custom-select" style="max-width: 90px;">
                                            <option value="1" selected>BTC</option>
                                            <option value="2">ETH</option>
                                            <option value="3">LTC</option>
                                        </select>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Price</label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Price">
                                        <div class="input-group-append">
                                            <label class="input-group-text">$</label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Total</label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary w-md">Exchange Coin</button>
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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Order book</h4>

                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th colspan="3">Buy</th>
                                <th colspan="3">Sell</th>
                            </tr>
                            <tr>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0.0412</td>
                                <td>0.0412</td>
                                <td>256.18</td>
                                <td>0.0201</td>
                                <td>0.0201</td>
                                <td>124.98</td>
                            </tr>
                            <tr>
                                <td>0.0301</td>
                                <td>0.0301</td>
                                <td>187.16</td>
                                <td>0.0165</td>
                                <td>0.0165</td>
                                <td>102.60</td>
                            </tr>
                            <tr>
                                <td>0.0523</td>
                                <td>0.0523</td>
                                <td>325.21</td>
                                <td>0.0348</td>
                                <td>0.0348</td>
                                <td>216.39</td>
                            </tr>
                            <tr>
                                <td>0.0432</td>
                                <td>0.0432</td>
                                <td>268.62</td>
                                <td>0.0321</td>
                                <td>0.0321</td>
                                <td>199.60</td>
                            </tr>
                            <tr>
                                <td>0.0246</td>
                                <td>0.0246</td>
                                <td>152.96</td>
                                <td>0.0403</td>
                                <td>0.0403</td>
                                <td>250.59</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Notifications</h4>

                <div data-simplebar style="max-height: 310px;">
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">15 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        If several languages coalesce of the resulting.
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">14 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        New common language will be more simple and regular than the existing
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">13 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        It will seem like simplified English as a skeptical Cambridge
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">13 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        To achieve this, it would be necessary
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">12 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        Cum sociis natoque penatibus et magnis dis
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">11 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        New common language will be more simple and regular than the existing
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">10 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        It will seem like simplified English as a skeptical Cambridge
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">09 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        To achieve this, it would be necessary
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- crypto exchange init -->
<script src="{{ URL::asset('/assets/js/pages/crypto-exchange.init.js') }}"></script>
@endsection