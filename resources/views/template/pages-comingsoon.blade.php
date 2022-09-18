@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Coming_Soon')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="index" class="text-white"><i class="fas fa-home h2"></i></a>
        </div>

        <div class="my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index" class="d-block auth-logo">
                                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20" class="auth-logo-dark mx-auto">
                                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20" class="auth-logo-light mx-auto">
                            </a>
                            <div class="row justify-content-center mt-5">
                                <div class="col-sm-4">
                                    <div class="maintenance-img">
                                        <img src="{{ URL::asset('/assets/images/coming-soon.svg') }}" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-5">Let's get started with Skote</h4>
                            <p class="text-muted">It will be as simple as Occidental in fact it will be Occidental.</p>

                            <div class="row justify-content-center mt-5">
                                <div class="col-md-8">
                                    <div data-countdown="2021/12/31" class="counter-number"></div>
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
        <!-- Plugins -->
        <script src="{{ URL::asset('/assets/libs/jquery-countdown/jquery-countdown.min.js') }}"></script>

        <!-- oming-soon init -->
        <script src="{{ URL::asset('/assets/js/pages/coming-soon.init.js') }}"></script>
    @endsection
