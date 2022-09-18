@extends('layouts.master')

@section('title') @lang('translation.Wallet') @endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Crypto @endslot
@slot('title') Wallet @endslot
@endcomponent

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">

                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <i class="mdi mdi-account-circle text-primary h1"></i>
                    </div>

                    <div class="flex-grow-1">
                        <div class="text-muted">
                            <h5>Henry Wells</h5>
                            <p class="mb-1">henrywells@abc.com</p>
                            <p class="mb-0">Id no: #SK0234</p>
                        </div>

                    </div>

                    <div class="dropdown ms-2">
                        <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <p class="text-muted mb-2">Available Balance</p>
                            <h5>$ 9148.23</h5>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-4 mt-sm-0">
                            <p class="text-muted mb-2">Since last month</p>
                            <h5>+ $ 248.35 <span class="badge bg-success ms-1 align-bottom">+ 1.3 %</span></h5>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body border-top">
                <p class="text-muted mb-4">In this month</p>
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-4">
                            <div>
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-send"></i>
                                </div>

                                <p class="text-muted mb-2">Send</p>
                                <h5>$ 654.42</h5>

                                <div class="mt-3">
                                    <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Send</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-import"></i>
                                </div>

                                <p class="text-muted mb-2">receive</p>
                                <h5>$ 1054.32</h5>

                                <div class="mt-3">
                                    <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Receive</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <div class="font-size-24 text-primary mb-2">
                                    <i class="bx bx-wallet"></i>
                                </div>

                                <p class="text-muted mb-2">Withdraw</p>
                                <h5>$ 824.34</h5>

                                <div class="mt-3">
                                    <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Withdraw</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="row">
            <div class="col-sm-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <i class="mdi mdi-bitcoin h2 text-warning mb-0"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">Bitcoin Wallet</p>
                                <h5 class="mb-0">1.02356 BTC <span class="font-size-14 text-muted">= $ 9148.00</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <i class="mdi mdi-ethereum h2 text-primary mb-0"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">Ethereum Wallet</p>
                                <h5 class="mb-0">0.04121 ETH <span class="font-size-14 text-muted">= $ 8235.00</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <i class="mdi mdi-litecoin h2 text-info mb-0"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">litecoin Wallet</p>
                                <h5 class="mb-0">0.00356 BTC <span class="font-size-14 text-muted">= $ 4721.00</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Overview</h4>

                <div>
                    <div id="overview-chart" class="apex-charts" dir="ltr"></div>
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
                <h4 class="card-title mb-4">Activities</h4>

                <ul class="nav nav-tabs nav-tabs-custom">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sell</a>
                    </li>
                </ul>

                <div class="mt-4">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID No</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Amount in USD</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3215</a></td>

                                    <td>03 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Bitcoin</td>
                                    <td>1.00952 BTC</td>
                                    <td>$ 9067.62</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3216</a></td>

                                    <td>04 Mar, 2020</td>
                                    <td>Sell</td>
                                    <td>Ethereum</td>
                                    <td>0.00413 ETH</td>
                                    <td>$ 2123.01</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3217</a></td>

                                    <td>04 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Bitcoin</td>
                                    <td>0.00321 BTC</td>
                                    <td>$ 1802.62</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3218</a></td>

                                    <td>05 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Litecoin</td>
                                    <td>0.00224 LTC</td>
                                    <td>$ 1773.01</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3219</a></td>

                                    <td>06 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Ethereum</td>
                                    <td>1.04321 ETH</td>
                                    <td>$ 9423.73</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3220</a></td>

                                    <td>07 Mar, 2020</td>
                                    <td>Sell</td>
                                    <td>Bitcoin</td>
                                    <td>0.00413 ETH</td>
                                    <td>$ 2123.01</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3221</a></td>

                                    <td>07 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Bitcoin</td>
                                    <td>1.00952 BTC</td>
                                    <td>$ 9067.62</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3222</a></td>

                                    <td>08 Mar, 2020</td>
                                    <td>Sell</td>
                                    <td>Ethereum</td>
                                    <td>0.00413 ETH</td>
                                    <td>$ 2123.01</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3223</a></td>

                                    <td>09 Mar, 2020</td>
                                    <td>Sell</td>
                                    <td>Litecoin</td>
                                    <td>1.00952 LTC</td>
                                    <td>$ 9067.62</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3224</a></td>

                                    <td>10 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Ethereum</td>
                                    <td>0.00413 ETH</td>
                                    <td>$ 2123.01</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3225</a></td>

                                    <td>11 Mar, 2020</td>
                                    <td>Buy</td>
                                    <td>Bitcoin</td>
                                    <td>1.00952 BTC</td>
                                    <td>$ 9067.62</td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3226</a></td>

                                    <td>12 Mar, 2020</td>
                                    <td>Sell</td>
                                    <td>Ethereum</td>
                                    <td>0.00413 ETH</td>
                                    <td>$ 2123.01</td>
                                </tr>


                            </tbody>
                        </table>
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

<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

<!-- crypto-wallet init -->
<script src="{{ URL::asset('/assets/js/pages/crypto-wallet.init.js') }}"></script>
@endsection