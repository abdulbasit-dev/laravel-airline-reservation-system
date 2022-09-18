@extends('layouts.master')

@section('title') @lang('translation.User_Grid') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Contacts @endslot
        @slot('title') Users Grid @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                            D
                        </span>
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">David McHenry</a></h5>
                    <p class="text-muted">UI/UX Designer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">illustrator</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-4">
                        <img class="rounded-circle avatar-sm" src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt="">
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Frank Kirk</a></h5>
                    <p class="text-muted">Frontend Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Html</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Css</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-4">
                        <img class="rounded-circle avatar-sm" src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" alt="">
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Rafael Morales</a></h5>
                    <p class="text-muted">Backend Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Php</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Java</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Python</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-16">
                            M
                        </span>
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Mark Ellison</a></h5>
                    <p class="text-muted">Full Stack Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Ruby</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Php</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-4">
                        <img class="rounded-circle avatar-sm" src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="">
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Minnie Walter</a></h5>
                    <p class="text-muted">Frontend Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Html</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Css</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-4">
                        <img class="rounded-circle avatar-sm" src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="">
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Shirley Smith</a></h5>
                    <p class="text-muted">UI/UX Designer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">illustrator</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-16">
                            J
                        </span>
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">John Santiago</a></h5>
                    <p class="text-muted">Full Stack Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Ruby</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Php</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-4">
                        <img class="rounded-circle avatar-sm" src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" alt="">
                    </div>
                    <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Colin Melton</a></h5>
                    <p class="text-muted">Backend Developer</p>

                    <div>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Php</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Java</a>
                        <a href="#" class="badge bg-primary font-size-11 m-1">Python</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-message-square-dots"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href=""><i class="bx bx-user-circle"></i></a>
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
                <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load more
                </a>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection
