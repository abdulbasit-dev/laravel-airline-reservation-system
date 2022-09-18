@extends('layouts.master')

@section('title') @lang('translation.Pricing') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Utility @endslot
@slot('title') Pricing @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mb-5">
            <h4>Choose your Pricing plan</h4>
            <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more
                common words If several languages coalesce</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Starter</h5>
                        <p class="text-muted">Neque quis est</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="bx bx-walk h1 text-primary"></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2><sup><small>$</small></sup> 19/ <span class="font-size-13">Per month</span></h2>
                </div>
                <div class="text-center plan-btn">
                    <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                </div>

                <div class="plan-features mt-5">
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Live Support</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Unlimited User</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> No Time Tracking</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Setup</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Professional</h5>
                        <p class="text-muted">Quis autem iure</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="bx bx-run h1 text-primary"></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2><sup><small>$</small></sup> 29/ <span class="font-size-13">Per month</span></h2>
                </div>
                <div class="text-center plan-btn">
                    <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                </div>

                <div class="plan-features mt-5">
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Live Support</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Unlimited User</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> No Time Tracking</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Setup</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Enterprise</h5>
                        <p class="text-muted">Sed ut neque unde</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="bx bx-cycling h1 text-primary"></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2><sup><small>$</small></sup> 39/ <span class="font-size-13">Per month</span></h2>
                </div>
                <div class="text-center plan-btn">
                    <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                </div>

                <div class="plan-features mt-5">
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Live Support</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Unlimited User</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> No Time Tracking</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Setup</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Unlimited</h5>
                        <p class="text-muted">Itaque earum hic</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="bx bx-car h1 text-primary"></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2><sup><small>$</small></sup> 49/ <span class="font-size-13">Per month</span></h2>
                </div>
                <div class="text-center plan-btn">
                    <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                </div>

                <div class="plan-features mt-5">
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Live Support</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Unlimited User</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> No Time Tracking</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Setup</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection