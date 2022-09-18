@extends('layouts.master')

@section('title') @lang('translation.Invoice_List') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Invoices @endslot
        @slot('title') Invoice List @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                        M
                                    </span>
                                </div>
                                <h5 class="mb-1 font-size-15 text-truncate">Marion Burton</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14251</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Skote Dashboard UI</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $1455</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 10 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Francis Witte</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14252</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Brand logo design</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1024</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 11 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Joseph Flint</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14253</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Landing page Design</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1189</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 12 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Larry Nielsen</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14254</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Redesign - Landing page</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1245</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 12 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Mark Evans</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14255</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Blog Template Design</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1024</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 11 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                    <span class="avatar-title rounded-circle bg-info bg-soft text-primary font-size-16">
                                        T
                                    </span>
                                </div>
                                <h5 class="mb-1 font-size-15 text-truncate">Timothy Lee</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14256</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Landing page Design</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1189</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 13 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Stanley Bland</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14257</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Landing page UI</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1148</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 14 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                    <span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-16">
                                        T
                                    </span>
                                </div>
                                <h5 class="mb-1 font-size-15 text-truncate">Tommy Wilson</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14258</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Redesign - Dashboard</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1259</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 15 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-lg-center">
                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}"
                                    class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none rounded-circle"
                                    alt="img" />
                                <h5 class="mb-1 font-size-15 text-truncate">Louis Brandon</h5>
                                <a href="#" class="text-muted">@Skote</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div>
                                <a href="invoices-detail"
                                    class="d-block text-primary text-decoration-underline mb-2">Invoice #14259</a>
                                <h5 class="text-truncate mb-4 mb-lg-5">Email Template UI</h5>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount">
                                            <i class="bx bx-money me-1 text-muted"></i> $ 1355</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-size-14" data-toggle="tooltip" data-placement="top"
                                            title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 15 Oct, 19</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-success"><i
                        class="bx bx-loader bx-spin font-size-18 align-middle me-2"></i> Load more </a>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection
