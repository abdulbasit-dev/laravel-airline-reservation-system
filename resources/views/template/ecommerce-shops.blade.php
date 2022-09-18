@extends('layouts.master')

@section('title') @lang('translation.Shops') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Ecommerce @endslot
        @slot('title') Shops @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class="avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                    B
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Brendle's</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>112</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$13,575</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-16">
                                    T
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Tech Hifi</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>104</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$11,145</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-danger bg-soft text-danger font-size-16">
                                    L
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Lafayette</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>126</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$12,356</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-16">
                                    P
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Packer</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>102</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$11,228</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-16">
                                    N
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Nedick's</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>96</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$9,235</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-dark bg-soft text-dark text-light font-size-16">
                                    H
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Hudson's</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>120</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$14,794</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-dark bg-soft text-dark text-light font-size-16">
                                    T
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Tech Hifi</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>104</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$11,145</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                    B
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Brendle's</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>112</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$13,575</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-center p-4 border-end">
                            <div class=" avatar-sm mx-auto mb-3 mt-1">
                                <span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-16">
                                    L
                                </span>
                            </div>
                            <h5 class="text-truncate pb-1">Lafayette</h5>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="p-4 text-center text-xl-start">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Products</p>
                                        <h5>126</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Wallet Balance</p>
                                        <h5>$12,356</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-decoration-underline text-reset">See Profile <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  end row -->

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
