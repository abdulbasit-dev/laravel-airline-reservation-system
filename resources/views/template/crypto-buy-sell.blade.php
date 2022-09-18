@extends('layouts.master')

@section('title') @lang('translation.Buy_Sell') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Crypto @endslot
@slot('title') Buy/Sell @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
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
                <h4 class="card-title mb-4">Buy/Sell Crypto</h4>
                <div class="crypto-buy-sell-nav">
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#buy" role="tab">
                                Buy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#sell" role="tab">
                                Sell
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content crypto-buy-sell-nav-content p-4">
                        <div class="tab-pane active" id="buy" role="tabpanel">
                            <form>
                                <div class="mb-2">
                                    <label>Currency :</label>

                                    <div class="row">
                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="buycurrencyoption1" class="card-radio-input" checked>

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-bitcoin font-size-24 text-warning align-middle me-2"></i>
                                                            <span>Bitcoin</span>
                                                        </div>
                                                    </div>
                                                </label>

                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.00016 BTC</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="buycurrencyoption2" class="card-radio-input">

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-ethereum font-size-24 text-primary align-middle me-2"></i>
                                                            <span>Ethereum</span>
                                                        </div>
                                                    </div>
                                                </label>

                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.0073 ETH</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="buycurrencyoption3" class="card-radio-input">

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-litecoin font-size-24 text-info align-middle me-2"></i>
                                                            <span>litecoin</span>
                                                        </div>
                                                    </div>
                                                </label>

                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.025 LTC</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-2">
                                    <label>Payment method :</label>

                                    <div class="row">
                                        <div class="col-xl-2 col-sm-4">
                                            <label class="card-radio-label mb-3">
                                                <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">

                                                <div class="card-radio">
                                                    <i class="fab fa-cc-mastercard font-size-24 text-primary align-middle me-2"></i>

                                                    <span>Credit / Debit Card</span>
                                                </div>
                                            </label>
                                        </div>


                                        <div class="col-xl-2 col-sm-4">
                                            <label class="card-radio-label mb-3">
                                                <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked>

                                                <div class="card-radio">
                                                    <i class="fab fa-cc-paypal font-size-24 text-primary align-middle me-2"></i>

                                                    <span>Paypal</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Add value :</label>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2 currency-value">
                                                <span class="input-group-text">Bitcoin</span>

                                                <input type="text" class="form-control" placeholder="Bitcoin">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control text-sm-end" placeholder="USD Amount">

                                                <span class="input-group-text">USD Amount</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Wallet Address :</label>
                                    <input type="text" class="form-control" placeholder="Wallet Address">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-success">Buy Crypto currency</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="sell" role="tabpanel">
                            <form>
                                <div class="mb-2">
                                    <label>Currency :</label>

                                    <div class="row">
                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="sellcurrencyoption1" class="card-radio-input" checked>

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-bitcoin font-size-24 text-warning align-middle me-2"></i>
                                                            <span>Bitcoin</span>
                                                        </div>
                                                    </div>
                                                </label>
                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.00016 BTC</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="sellcurrencyoption2" class="card-radio-input">

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-ethereum font-size-24 text-primary align-middle me-2"></i>
                                                            <span>Ethereum</span>
                                                        </div>
                                                    </div>
                                                </label>
                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.0073 ETH</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-sm-4">
                                            <div class="mb-3">
                                                <label class="card-radio-label mb-2">
                                                    <input type="radio" name="currency" id="sellcurrencyoption3" class="card-radio-input">

                                                    <div class="card-radio">
                                                        <div>
                                                            <i class="mdi mdi-litecoin font-size-24 text-info align-middle me-2"></i>
                                                            <span>litecoin</span>
                                                        </div>

                                                    </div>
                                                </label>

                                                <div>
                                                    <p class="text-muted mb-1">Current price :</p>
                                                    <h5 class="font-size-16">0.025 LTC</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label>Email :</label>
                                    <input type="email" placeholder="Email" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Add value :</label>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2 currency-value">
                                                <span class="input-group-text">Crypto value</span>
                                                <input type="text" class="form-control" placeholder="Crypto value">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control text-sm-end" placeholder="USD Amount">

                                                <span class="input-group-text">USD Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Wallet Address :</label>
                                    <input type="text" class="form-control" placeholder="Wallet Address">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-danger">Sell Crypto currency</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- end row -->

@endsection