@extends('layouts.master')

@section('title') @lang('translation.Cards') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') UI Elements @endslot
        @slot('title') Cards @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-6 col-xl-3">

            <!-- Simple card -->
            <div class="card">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-md-6 col-xl-3">

            <div class="card">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-md-6 col-xl-3">

            <div class="card">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-3.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                </div>
            </div>

        </div><!-- end col -->


        <div class="col-md-6 col-xl-3">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-0">Card title</h4>
                    <h6 class="card-subtitle font-14 text-muted">Support card subtitle</h6>
                </div>
                <img class="img-fluid" src="{{ URL::asset('/assets/images/small/img-4.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <h3 class="card-title mt-0">Special title treatment</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional
                    content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body">
                <h3 class="card-title mt-0">Special title treatment</h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional
                    content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body">
                <h4 class="card-title mt-0">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional
                    content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4 ">
            <div class="card card-body text-center">
                <h4 class="card-title mt-0">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional
                    content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-body text-end">
                <h4 class="card-title mt-0">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional
                    content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header bg-transparent border-bottom text-uppercase">Featured</h5>
                <div class="card-body">
                    <h4 class="card-title mt-0">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    Quote
                </div>
                <div class="card-body">
                    <blockquote class="card-blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer font-size-12 mt-0">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    Featured
                </div>
                <div class="card-body">
                    <h4 class="card-title mt-0">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                </div>
                <div class="card-footer bg-transparent border-top text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Card title</h4>
                    <p class="card-text">This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a little bit
                        longer.</p>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-0">Card title</h4>
                    <p class="card-text">This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a little bit
                        longer.</p>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
                <img class="card-img-bottom img-fluid" src="{{ URL::asset('/assets/images/small/img-7.jpg') }}" alt="Card image cap">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <img class="card-img img-fluid" src="{{ URL::asset('/assets/images/small/img-6.jpg') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h4 class="card-title text-white mt-0">Card title</h4>
                    <p class="card-text text-white">This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a little bit
                        longer.</p>
                    <p class="card-text">
                        <small class="text-white">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                        <img class="card-img img-fluid" src="{{ URL::asset('/assets/images/small/img-2.jpg') }}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="card-img img-fluid" src="{{ URL::asset('/assets/images/small/img-3.jpg') }}" alt="Card image">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-primary text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i> Primary Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-success text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-check-all me-3"></i> Success Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-info text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-circle-outline me-3"></i>Info Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-warning text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-outline me-3"></i>Warning Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-danger text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-block-helper me-3"></i>Danger Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark text-light">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-light"><i class="mdi mdi-alert-circle-outline me-3"></i>Dark Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title mt-0">card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border border-danger">
                <div class="card-header bg-transparent border-danger">
                    <h5 class="my-0 text-danger"><i class="mdi mdi-block-helper me-3"></i>Danger outline Card</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title mt-0">card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Success Card</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title mt-0">card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <h4 class="my-3">Card groups</h4>
            <div class="card-deck-wrapper">
                <div class="card-group">
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-4.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Card title</h4>
                            <p class="card-text">This is a longer card with supporting text below as
                                a natural lead-in to additional content. This content is a little
                                bit longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural
                                lead-in to additional content.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-6.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Card title</h4>
                            <p class="card-text">This is a wider card with supporting text below as
                                a natural lead-in to additional content. This card has even longer
                                content than the first to show that equal height action.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <h4 class="my-3">Cards Masonry</h4>

            <div class="row" data-masonry='{"percentPosition": true }'>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <img src="{{ URL::asset('/assets/images/small/img-3.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title that wraps to a new line</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <img src="{{ URL::asset('/assets/images/small/img-5.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <img src="{{ URL::asset('/assets/images/small/img-7.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card p-3 text-end">
                        <blockquote class="blockquote blockquote-reverse  mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer mt-0">
                                <small class="text-muted">
                                    Someone famous in <cite title="Source Title">Source Title</cite>
                                </small>
                            </footer>
                        </blockquote>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote font-size-14 mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer font-size-12 mt-0">
                                    Someone famous in <cite title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card bg-primary text-white text-center p-3">
                        <blockquote class="card-blockquote font-size-14 mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                            <footer class="blockquote-footer text-white font-size-12 mt-0 mb-0">
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is another card with title and supporting text below. This card has
                                some additional content to make it slightly taller overall.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- masonry pkgd -->
    <script src="{{ URL::asset('/assets/libs/masonry-layout/masonry-layout.min.js') }}"></script>
@endsection
