@extends('layouts.master')

@section('title') @lang('translation.Crypto') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Crypto @endslot
@endcomponent

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="float-end dropdown ms-2">
                    <a class="text-muted dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div>
                    <div class="mb-4 me-3">
                        <i class="mdi mdi-account-circle text-primary h1"></i>
                    </div>

                    <div>
                        <h5>Henry Wells</h5>
                        <p class="text-muted mb-1">henrywells@abc.com</p>
                        <p class="text-muted mb-0">Id no: #SK0234</p>

                    </div>
                </div>
            </div>

            <div class="card-body border-top">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <p class="fw-medium mb-2">Balance :</p>
                            <h4>$ 6134.39</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <p class="fw-medium mb-2">Coin :</p>
                            <div class="d-inline-flex align-items-center mt-1" id="tooltip-container">

                                <a href="javascript: void(0);" class="m-1">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                            <i class="mdi mdi-bitcoin"></i>
                                        </span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="m-1">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                            <i class="mdi mdi-ethereum"></i>
                                        </span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="m-1">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-18">
                                            <i class="mdi mdi-litecoin"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-transparent border-top">
                <div class="text-center">
                    <a href="#" class="btn btn-outline-light me-2 w-md">Deposit</a>
                    <a href="#" class="btn btn-primary me-2 w-md">Buy / Sell</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div>
                <div class="row">
                    <div class="col-lg-9 col-sm-8">
                        <div class="p-4">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p>Skote Crypto Dashboard</p>

                            <div class="text-muted">
                                <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> If
                                    several languages coalesce</p>
                                <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Sed
                                    ut perspiciatis unde</p>
                                <p class="mb-0"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> It
                                    would be necessary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 align-self-center">
                        <div>
                            <img src="{{ URL::asset('/assets/images/crypto/features-img/img-1.png') }}" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-4"><i class="mdi mdi-bitcoin h2 text-warning align-middle mb-0 me-3"></i> Bitcoin </p>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <h5>$ 9134.39</h5>
                                    <p class="text-muted text-truncate mb-0">+ 0.0012 ( 0.2 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div id="area-sparkline-chart-1" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-4"><i class="mdi mdi-ethereum h2 text-primary align-middle mb-0 me-3"></i> Ethereum </p>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <h5>$ 245.44</h5>
                                    <p class="text-muted text-truncate mb-0">- 4.102 ( 0.1 % ) <i class="mdi mdi-arrow-down ms-1 text-danger"></i></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div id="area-sparkline-chart-2" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-4"><i class="mdi mdi-litecoin h2 text-info align-middle mb-0 me-3"></i>
                            litecoin </p>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <h5>$ 63.61</h5>
                                    <p class="text-muted text-truncate mb-0">+ 1.792 ( 0.1 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div id="area-sparkline-chart-3" class="apex-charts"></div>
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
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <select class="form-select form-select-sm ms-2">
                        <option value="MA" selected>March</option>
                        <option value="FE">February</option>
                        <option value="JA">January</option>
                        <option value="DE">December</option>
                    </select>
                </div>
                <h4 class="card-title mb-3">Wallet Balance</h4>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <p>Available Balance</p>
                            <h4>$ 6134.39</h4>

                            <p class="text-muted mb-4"> + 0.0012.23 ( 0.2 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>

                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="mb-2">Income</p>
                                        <h5>$ 2632.46</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="mb-2">Expense</p>
                                        <h5>$ 924.38</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div>
                            <div id="wallet-balance-chart" class="apex-charts"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 align-self-center">
                        <div>
                            <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>
                                Ethereum</p>
                            <h5>4.5701 ETH = <span class="text-muted font-size-14">$ 1123.64</span></h5>
                        </div>

                        <div class="mt-4 pt-2">
                            <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-warning"></i>
                                Bitcoin</p>
                            <h5>0.4412 BTC = <span class="text-muted font-size-14">$ 4025.32</span></h5>
                        </div>

                        <div class="mt-4 pt-2">
                            <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i>
                                Litecoin</p>
                            <h5>35.3811 LTC = <span class="text-muted font-size-14">$ 2263.09</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Overview</h4>

                <div>

                    <div id="overview-chart" class="apex-charts" dir="ltr">
                        <div class="toolbar d-flex flex-wrap gap-2 justify-content-center">
                            <button type="button" class="btn btn-light btn-sm" id="one_month">
                                1M
                            </button>
                            <button type="button" class="btn btn-light btn-sm" id="six_months">
                                6M
                            </button>
                            <button type="button" class="btn btn-light btn-sm active" id="one_year">
                                1Y
                            </button>
                            <button type="button" class="btn btn-light btn-sm" id="all">
                                ALL
                            </button>
                        </div>
                        <div id="overview-chart-timeline"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Transactions</h4>

                <ul class="nav nav-pills bg-light rounded" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">Sell</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 330px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy LTC</h5>
                                                <p class="text-muted mb-0">16 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$94.22</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0">17 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$84.32</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0">18 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$145.80</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 330px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0">17 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$84.32</h5>
                                            </div>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy LTC</h5>
                                                <p class="text-muted mb-0">16 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$94.22</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0">18 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$145.80</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 330px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy LTC</h5>
                                                <p class="text-muted mb-0">16 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$94.22</h5>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0">17 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$84.32</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0">18 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$145.80</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0">15 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$112.34</h5>
                                            </div>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-primary">
                                                <i class="bx bx-down-arrow-circle"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0">14 Mar, 2020</p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">$125.20</h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Notifications</h4>

                <ul class="list-group" data-simplebar style="max-height: 390px;">
                    <li class="list-group-item border-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/companies/img-1.png" alt="" height="18">
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-14">Donec vitae sapien ut</h5>
                                <p class="text-muted">If several languages coalesce, the grammar of the resulting language</p>

                                <div class="float-end">
                                    <p class="text-muted mb-0"><i class="mdi mdi-account me-1"></i> Joseph</p>
                                </div>
                                <p class="text-muted mb-0">12 Mar, 2020</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/companies/img-2.png" alt="" height="18">
                                    </span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-14">Cras ultricies mi eu turpis</h5>
                                <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical cambridge</p>

                                <div class="float-end">
                                    <p class="text-muted mb-0"><i class="mdi mdi-account me-1"></i> Jerry</p>
                                </div>
                                <p class="text-muted mb-0">13 Mar, 2020</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/companies/img-3.png" alt="" height="18">
                                    </span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-14">Duis arcu tortor suscipit</h5>
                                <p class="text-muted">It va esser tam simplic quam occidental in fact, it va esser occidental.</p>

                                <div class="float-end">
                                    <p class="text-muted mb-0"><i class="mdi mdi-account me-1"></i> Calvin</p>
                                </div>
                                <p class="text-muted mb-0">14 Mar, 2020</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/companies/img-1.png" alt="" height="18">
                                    </span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-14">Donec vitae sapien ut</h5>
                                <p class="text-muted">If several languages coalesce, the grammar of the resulting language</p>

                                <div class="float-end">
                                    <p class="text-muted mb-0"><i class="mdi mdi-account me-1"></i> Joseph</p>
                                </div>
                                <p class="text-muted mb-0">12 Mar, 2020</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buy / Sell</h4>

                <ul class="nav nav-pills bg-light rounded" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#buy-tab" role="tab">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#sell-tab" role="tab">Sell</a>
                    </li>
                </ul>

                <div class="tab-content mt-4" style="min-height: 340px;">
                    <div class="tab-pane active" id="buy-tab" role="tabpanel">
                        <div class="float-end ms-2">
                            <h5 class="font-size-14"><i class="bx bx-wallet text-primary font-size-16 align-middle me-1"></i> $4235.23</h5>
                        </div>
                        <h5 class="font-size-14 mb-4">Buy Coin</h5>

                        <div>

                            <div class="form-group mb-3">
                                <label>Payment method :</label>
                                <select class="form-select">
                                    <option>Credit / Debit Card</option>
                                    <option>Paypal</option>
                                </select>
                            </div>

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
                                    <input type="text" class="form-control">
                                    <label class="input-group-text">$</label>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Total</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-success w-md">Buy Coin</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="sell-tab" role="tabpanel">
                        <div class="float-end ms-2">
                            <h5 class="font-size-14"><i class="bx bx-wallet text-primary font-size-16 align-middle me-1"></i> $4235.23</h5>
                        </div>
                        <h5 class="font-size-14 mb-4">Sell Coin</h5>

                        <div>

                            <div class="form-group mb-3">
                                <label>Email :</label>
                                <input type="email" class="form-control">
                            </div>

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

                                    <input type="text" class="form-control">

                                    <label class="input-group-text">$</label>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Total</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-danger w-md">Sell Coin</button>
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
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- crypto dash init js -->
<script src="{{ URL::asset('/assets/js/pages/crypto-dashboard.init.js') }}"></script>
@endsection