@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Confirm_Mail')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 text-muted">
                            <a href="index" class="d-block auth-logo">
                                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20"
                                    class="auth-logo-dark mx-auto">
                                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20"
                                    class="auth-logo-light mx-auto">
                            </a>
                            <p class="mt-3">Responsive Bootstrap 5 Admin Dashboard</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body">

                                <div class="p-2">
                                    <div class="text-center">

                                        <div class="avatar-md mx-auto">
                                            <div class="avatar-title rounded-circle bg-light">
                                                <i class="bx bx-mail-send h1 mb-0 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="p-2 mt-4">
                                            <h4>Success !</h4>
                                            <p class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus
                                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                                et</p>
                                            <div class="mt-4">
                                                <a href="index" class="btn btn-success">Back to Home</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <p>© <script>
                                    document.write(new Date().getFullYear())

                                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
