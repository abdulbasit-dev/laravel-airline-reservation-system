@extends('layouts.master')

@section('title') @lang('translation.Product_Detail') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Product Detail @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                            <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                            <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                            <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                            <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div>
                                                <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                            <div>
                                                <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                            <div>
                                                <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                            <div>
                                                <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                            <i class="bx bx-cart me-2"></i> Add to cart
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                            <i class="bx bx-shopping-bag me-2"></i>Buy now
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            <a href="javascript: void(0);" class="text-primary">Headphone</a>
                            <h4 class="mt-1 mb-3">Wireless Headphone (Black)</h4>

                            <p class="text-muted float-start me-3">
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star"></span>
                            </p>
                            <p class="text-muted mb-4">( 152 Customers Review )</p>

                            <h6 class="text-success text-uppercase">20 % Off</h6>
                            <h5 class="mb-4">Price : <span class="text-muted me-2"><del>$240 USD</del></span> <b>$225 USD</b></h5>
                            <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wireless</p>
                                        <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Wireless Range : 10m</p>
                                        <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i> Battery life : 6hrs</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i> Bass</p>
                                        <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Warranty : 1 Year</p>
                                    </div>
                                </div>
                            </div>

                            <div class="product-color">
                                <h5 class="font-size-15">Color :</h5>
                                <a href="javascript: void(0);" class="active">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Black</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Blue</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Gray</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-5">
                    <h5 class="mb-3">Specifications :</h5>

                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 400px;">Category</th>
                                    <td>Headphone</td>
                                </tr>
                                <tr>
                                    <th scope="row">Brand</th>
                                    <td>JBL</td>
                                </tr>
                                <tr>
                                    <th scope="row">Color</th>
                                    <td>Black</td>
                                </tr>
                                <tr>
                                    <th scope="row">Connectivity</th>
                                    <td>Bluetooth</td>
                                </tr>
                                <tr>
                                    <th scope="row">Warranty Summary</th>
                                    <td>1 Year</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end Specifications -->

                <div class="mt-5">
                    <h5>Reviews :</h5>

                    <div class="d-flex py-3 border-bottom">
                        <div class="flex-shrink-0 me-3">
                            <img src="assets/images/users/avatar-2.jpg" class="avatar-xs rounded-circle" alt="img" />
                        </div>

                        <div class="flex-grow-1">
                            <h5 class="mb-1 font-size-15">Brian</h5>
                            <p class="text-muted">If several languages coalesce, the grammar of the resulting language.</p>
                            <ul class="list-inline float-sm-end mb-sm-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                </li>
                            </ul>
                            <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary me-1"></i> 5 hrs ago</div>
                        </div>
                    </div>
                    <div class="d-flex py-3 border-bottom">
                        <div class="flex-shrink-0 me-3">
                            <img src="assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle" alt="img" />
                        </div>

                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1">Denver</h5>
                            <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                            <ul class="list-inline float-sm-end mb-sm-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                </li>
                            </ul>
                            <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary me-1"></i> 07 Oct, 2019</div>
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0 me-2">
                                    <img src="assets/images/users/avatar-5.jpg" class="avatar-xs me-3 rounded-circle" alt="img" />
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="mb-1 font-size-15">Henry</h5>
                                    <p class="text-muted">Their separate existence is a myth. For science, music, sport, etc.</p>
                                    <ul class="list-inline float-sm-end mb-sm-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary me-1"></i> 08 Oct, 2019</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex py-3 border-bottom">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-xs">
                                <span class="avatar-title bg-primary bg-soft text-primary rounded-circle font-size-16">
                                    N
                                </span>
                            </div>
                        </div>

                        <div class="flex-grow-1">
                            <h5 class="mb-1 font-size-15">Neal</h5>
                            <p class="text-muted">Everyone realizes why a new common language would be desirable.</p>
                            <ul class="list-inline float-sm-end mb-sm-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                </li>
                            </ul>
                            <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary me-1"></i> 05 Oct, 2019</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

<div class="row mt-3">
    <div class="col-lg-12">
        <div>
            <h5 class="mb-3">Recent product :</h5>

            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-center text-md-start pt-3 pt-md-0">
                                        <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Wireless Headphone</a></h5>
                                        <p class="text-muted mb-4">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star"></i>
                                        </p>
                                        <h5 class="my-0"><span class="text-muted me-2"><del>$240</del></span> <b>$225</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="assets/images/product/img-4.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-center text-md-start pt-3 pt-md-0">
                                        <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Phone patterned cases</a></h5>
                                        <p class="text-muted mb-4">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star"></i>
                                        </p>
                                        <h5 class="my-0"><span class="text-muted me-2"><del>$150</del></span> <b>$145</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="assets/images/product/img-6.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-center text-md-start pt-3 pt-md-0">

                                        <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Phone Dark Patterned cases</a></h5>
                                        <p class="text-muted mb-4">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star"></i>
                                        </p>
                                        <h5 class="my-0"><span class="text-muted me-2"><del>$138</del></span> <b>$135</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<!-- end row -->

@endsection