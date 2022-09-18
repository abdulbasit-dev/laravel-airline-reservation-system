@extends('layouts.master')

@section('title') @lang('translation.Blog_List') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Blog @endslot
@slot('title') Blog List @endslot
@endcomponent

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#all-post" role="tab">
                        All Post
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#archive" role="tab">
                        Archive
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="all-post" role="tabpanel">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div>
                                                <h5 class="mb-0">Blog List</h5>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div>
                                                <ul class="nav nav-pills justify-content-end">
                                                    <li class="nav-item">
                                                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">View :</a>
                                                    </li>
                                                    <li class="nav-item" data-bs-placement="top" title="List">
                                                        <a class="nav-link active" href="blog-list">
                                                            <i class="mdi mdi-format-list-bulleted"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-bs-placement="top" title="Grid">
                                                        <a class="nav-link" href="blog-grid">
                                                            <i class="mdi mdi-view-grid-outline"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <hr class="mb-4">

                                    <div>
                                        <h5><a href="blog-details" class="text-dark">Beautiful Day with Friends</a>
                                        </h5>
                                        <p class="text-muted">10 Apr, 2020</p>

                                        <div class="position-relative mb-3">
                                            <img src="{{ URL::asset('/assets/images/small/img-2.jpg') }}" alt="" class="img-thumbnail">
                                        </div>

                                        <ul class="list-inline">
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="text-muted">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    Project
                                                </a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="text-muted">
                                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12
                                                    Comments
                                                </a>
                                            </li>
                                        </ul>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                            adipisci velit, aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
                                        </p>

                                        <div>
                                            <a href="#" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>

                                    <hr class="my-5">

                                    <div>
                                        <h5><a href="blog-details" class="text-dark">Project discussion with
                                                team</a></h5>
                                        <p class="text-muted">24 Mar, 2020</p>

                                        <div class="position-relative mb-3">
                                            <img src="{{ URL::asset('/assets/images/small/img-6.jpg') }}" alt="" class="img-thumbnail">

                                            <div class="blog-play-icon">
                                                <a href="javascript: void(0);" class="avatar-sm d-block mx-auto">
                                                    <span class="avatar-title rounded-circle font-size-18"><i class="mdi mdi-play"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <ul class="list-inline">
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="text-muted">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    Development
                                                </a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="#" class="text-muted">
                                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08
                                                    Comments
                                                </a>
                                            </li>
                                        </ul>

                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores similique sunt
                                            in culpa qui officia deserunt mollitia animi est</p>

                                        <div>
                                            <a href="#" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>

                                    <hr class="my-5">

                                    <div class="text-center">
                                        <ul class="pagination justify-content-center pagination-rounded">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">...</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">10</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="archive" role="tabpanel">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h5>Archive</h5>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="me-2">
                                            <h4>2020</h4>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">03</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Beautiful Day with Friends</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>

                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="me-2">
                                            <h4>2019</h4>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">06</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Coffee with Friends</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Neque porro quisquam est</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Quis autem vel eum iure</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Cras mi eu turpis</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>

                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="me-2">
                                            <h4>2018</h4>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">03</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Beautiful Day with Friends</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>

                                        <a href="blog-details" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body p-4">
                <div class="search-box">
                    <p class="text-muted">Search</p>
                    <div class="position-relative">
                        <input type="text" class="form-control rounded bg-light border-light" placeholder="Search...">
                        <i class="mdi mdi-magnify search-icon"></i>
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Categories</p>

                    <ul class="list-unstyled fw-medium">
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i>
                                Design</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i>
                                Development <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">04</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i>
                                Business</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i>
                                Project</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i>
                                Travel<span class="badge badge-soft-success rounded-pill ms-1 float-end font-size-12">12</span></a>
                        </li>
                    </ul>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Archive</p>

                    <ul class="list-unstyled fw-medium">
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> 2020
                                <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">03</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> 2019
                                <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">06</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> 2018
                                <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">05</span></a>
                        </li>
                    </ul>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted mb-2">Popular Posts</p>

                    <div class="list-group list-group-flush">

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/small/img-7.jpg" alt="" class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Beautiful Day with Friends</h5>
                                    <p class="mb-0 text-truncate">10 Apr, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/small/img-4.jpg" alt="" class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Drawing a sketch</h5>
                                    <p class="mb-0 text-truncate">24 Mar, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/small/img-6.jpg" alt="" class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Project discussion with team</h5>
                                    <p class="mb-0 text-truncate">11 Mar, 2020</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Tags</p>

                    <div class="d-flex flex-wrap gap-2 widget-tag">
                        <div><a href="#" class="badge bg-light font-size-12">Design</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Development</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Business</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Project</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Travel</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Lifestyle</a></div>
                        <div><a href="#" class="badge bg-light font-size-12">Photography</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

@endsection