@extends('layouts.master')

@section('title') @lang('translation.Project_Overview') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Projects @endslot
@slot('title') Projects Overview @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm">
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Skote Dashboard UI</h5>
                        <p class="text-muted">Separate existence is a myth. For science, music, sport, etc.</p>
                    </div>
                </div>

                <h5 class="font-size-15 mt-4">Project Details :</h5>

                <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc,</p>

                <div class="text-muted mt-4">
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it would be necessary</p>
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is a myth.</p>
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages coalesce</p>
                </div>

                <div class="row task-dates">
                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                            <p class="text-muted mb-0">08 Sept, 2019</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date</h5>
                            <p class="text-muted mb-0">12 Oct, 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Team Members</h4>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                <td style="width: 50px;"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Daniel Canales</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Jennifer Walker</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI / UX</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                            C
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Carl Mackay</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Janice Cole</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                            T
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Tony Brafford</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Overview</h4>

                <div id="overview-chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Attached Files</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle table-hover mb-0">
                        <tbody>
                            <tr>
                                <td style="width: 45px;">
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                            <i class="bx bxs-file-doc"></i>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Landing.Zip</a></h5>
                                    <small>Size : 3.25 MB</small>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                            <i class="bx bxs-file-doc"></i>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Admin.Zip</a></h5>
                                    <small>Size : 3.15 MB</small>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                            <i class="bx bxs-file-doc"></i>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Logo.Zip</a></h5>
                                    <small>Size : 2.02 MB</small>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                            <i class="bx bxs-file-doc"></i>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark">Veltrix admin.Zip</a></h5>
                                    <small>Size : 2.25 MB</small>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Comments</h4>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0 me-3">
                        <img class="d-flex-object rounded-circle avatar-xs" alt="" src="assets/images/users/avatar-2.jpg">
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-13 mb-1">David Lambert</h5>
                        <p class="text-muted mb-1">
                            Separate existence is a myth.
                        </p>
                    </div>
                    <div class="ms-3">
                        <a href="javascript: void(0);" class="text-primary">Reply</a>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0 me-3">
                        <img class="d-flex-object rounded-circle avatar-xs" alt="" src="assets/images/users/avatar-3.jpg">
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-13 mb-1">Steve Foster</h5>
                        <p class="text-muted mb-1">
                            <a href="javascript: void(0);" class="text-success">@Henry</a>
                            To an English person it will like simplified
                        </p>
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                        J
                                    </span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-13 mb-1">Jeffrey Walker</h5>
                                <p class="text-muted mb-1">
                                    as a skeptical Cambridge friend
                                </p>
                            </div>
                            <div class="ms-3">
                                <a href="javascript: void(0);" class="text-primary">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-3">
                        <a href="javascript: void(0);" class="text-primary">Reply</a>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                S
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="font-size-13 mb-1">Steven Carlson</h5>
                        <p class="text-muted mb-1">
                            Separate existence is a myth.
                        </p>
                    </div>
                    <div class="ms-3">
                        <a href="javascript: void(0);" class="text-primary">Reply</a>
                    </div>
                </div>

                <div class="text-center mt-4 pt-2">
                    <a href="javascript: void(0);" class="btn btn-primary btn-sm">View more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- project-overview init -->
<script src="{{ URL::asset('/assets/js/pages/project-overview.init.js') }}"></script>
@endsection