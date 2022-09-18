@extends('layouts.master')

@section('title') @lang('translation.General') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') General @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div>
                            <h4 class="card-title">Badges</h4>
                            <p class="card-title-desc">Add any of the below mentioned modifier classes to change the appearance of a badge.</p>
                            <div>
                                <span class="badge bg-primary">Primary</span>
                                <span class="badge bg-success">Success</span>
                                <span class="badge bg-info">Info</span>
                                <span class="badge bg-warning">Warning</span>
                                <span class="badge bg-danger">Danger</span>
                                <span class="badge bg-dark">Dark</span>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-size-14">Soft Badge</h5>
                                <div class="mt-1">
                                    <span class="badge badge-soft-primary">Primary</span>
                                    <span class="badge badge-soft-success">Success</span>
                                    <span class="badge badge-soft-info">Info</span>
                                    <span class="badge badge-soft-warning">Warning</span>
                                    <span class="badge badge-soft-danger">Danger</span>
                                    <span class="badge badge-soft-dark">Dark</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mt-4 mt-lg-0">
                            <h4 class="card-title">Pill badges</h4>
                            <p class="card-title-desc">Use the <code>.rounded-pill</code> modifier class to make
                                badges more rounded (with a larger <code>border-radius</code>
                                and additional horizontal <code>padding</code>).
                                Useful if you miss the badges from v3.</p>

                            <div>
                                <span class="badge rounded-pill bg-primary">Primary</span>
                                <span class="badge rounded-pill bg-success">Success</span>
                                <span class="badge rounded-pill bg-info">Info</span>
                                <span class="badge rounded-pill bg-warning">Warning</span>
                                <span class="badge rounded-pill bg-danger">Danger</span>
                                <span class="badge rounded-pill bg-dark">Dark</span>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-size-14">Soft Badge</h5>
                                <div class="mt-1">
                                    <span class="badge rounded-pill badge-soft-primary">Primary</span>
                                    <span class="badge rounded-pill badge-soft-success">Success</span>
                                    <span class="badge rounded-pill badge-soft-info">Info</span>
                                    <span class="badge rounded-pill badge-soft-warning">Warning</span>
                                    <span class="badge rounded-pill badge-soft-danger">Danger</span>
                                    <span class="badge rounded-pill badge-soft-dark">Dark</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <hr class="mt-5">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mt-4">
                            <h4 class="card-title">Badges in Buttons</h4>
                            <p class="card-title-desc">Badges can be used as part of links or buttons to provide a counter.</p>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary">
                                    Notifications <span class="badge bg-success ms-1">4</span>
                                </button>
                                <button type="button" class="btn btn-success">
                                    Messages <span class="badge bg-danger ms-1">2</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    Draft <span class="badge bg-success ms-1">2</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4">
                            <h4 class="card-title">Badges Position Examples</h4>
                            <p class="card-title-desc">Example of Badges Position</p>

                            <div class="d-flex flex-wrap gap-3">
                                <button type="button" class="btn btn-primary position-relative">
                                    Mails <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">+99 <span class="visually-hidden">unread messages</span></span>
                                </button>


                                <button type="button" class="btn btn-light position-relative">
                                    Alerts <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">unread messages</span></span>
                                </button>

                                <button type="button" class="btn btn-primary position-relative p-0 avatar-xs rounded">
                                    <span class="avatar-title bg-transparent">
                                        <i class="bx bxs-envelope"></i>
                                    </span>
                                    <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">unread messages</span></span>
                                </button>

                                <button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle">
                                    <span class="avatar-title bg-transparent text-reset">
                                        <i class="bx bxs-bell"></i>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle">
                                    <span class="avatar-title bg-transparent text-reset">
                                        <i class="bx bx-menu"></i>
                                    </span>
                                    <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-1"><span class="visually-hidden">unread messages</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Popovers</h4>
                <p class="card-title-desc">Four options are available: top, right, bottom, and left aligned. Directions are mirrored when using Bootstrap in RTL.</p>

                <div class="d-flex flex-wrap gap-2">

                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Popover on top
                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Popover on right
                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Popover on bottom
                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="popover" data-bs-placement="left" title="Popover Title" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Popover on left
                    </button>

                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</button>
                </div>

            </div>
        </div>

    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Tooltips</h4>
                <p class="card-title-desc">Hover over the links below to see tooltips:</p>

                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                        Tooltip on top
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                        Tooltip on right
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                        Tooltip on bottom
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                        Tooltip on left
                    </button>

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
                <h4 class="card-title mb-4">Pagination</h4>

                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="font-size-14">Default Example</h5>
                        <p class="card-title-desc">Pagination links indicate a series of related content exists across multiple pages.</p>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="mdi mdi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-lg-0">
                            <h5 class="font-size-14">Disabled and active states</h5>
                            <p class="card-title-desc">Pagination links are customizable for
                                different circumstances. Use <code>.disabled</code> for links that appear
                                un-clickable and <code>.active</code> to
                                indicate the current page.</p>


                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <span class="page-link">
                                            2
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="mt-4">
                            <h5 class="font-size-14">Sizing</h5>
                            <p class="card-title-desc">Fancy larger or smaller pagination? Add <code>.pagination-lg</code> or <code>.pagination-sm</code> for additional
                                sizes.</p>

                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <nav aria-label="...">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4">
                            <h5 class="font-size-14">Alignment</h5>
                            <p class="card-title-desc">Change the alignment of pagination
                                components with flexbox utilities.</p>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Border spinner</h4>
                <p class="card-title-desc">Use the border spinners for a lightweight loading indicator.</p>
                <div>
                    <div class="spinner-border text-primary m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-secondary m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-success m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-info m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-warning m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-danger m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-dark m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Growing spinner</h4>
                <p class="card-title-desc">If you don’t fancy a border spinner, switch to the grow spinner. While it doesn’t technically spin, it does repeatedly grow!</p>
                <div>
                    <div class="spinner-grow text-primary m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger m-1" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark m-1" role="status">
                        <span class="sr-only">Loading...</span>
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
                <h4 class="card-title">Close Button</h4>
                <p class="card-title-desc">Provide an option to dismiss or close a component with <code>.btn-close</code>. Default styling is limited, but highly customizable. Modify the Sass variables to replace the default <code>background-image</code>. <strong>Be sure to include text for screen readers</strong>, as we’ve done with <code>aria-label</code>.</p>

                <div>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Disable Close Button</h4>
                <p class="card-title-desc">Disabled close buttons change their <code>opacity</code>. We’ve also applied <code>pointer-events: none</code> and <code>user-select: none</code> to preventing hover and active states from triggering.</p>

                <div>
                    <button type="button" class="btn-close" disabled aria-label="Close"></button>
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
                <h4 class="card-title">Close Button White Variant</h4>
                <p class="card-title-desc">Change the default <code>.btn-close</code> to be white with the <code>.btn-close-white</code> class. This class uses the <code>filter</code> property to invert the <code>background-image</code>.</p>

                <div class="card-body bg-dark">
                    <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                    <button type="button" class="btn-close btn-close-white" disabled="" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection