@extends('layouts.master')

@section('title') @lang('translation.Projects_List') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Projects @endslot
        @slot('title') Projects List
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 100px">#</th>
                                <th scope="col">Projects</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Team</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-1.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin
                                            Design</a></h5>
                                    <p class="text-muted mb-0">It will be as simple as Occidental</p>
                                </td>
                                <td>15 Oct, 19</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-2.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">Brand logo
                                            design</a></h5>
                                    <p class="text-muted mb-0">To achieve it would be necessary</p>
                                </td>
                                <td>22 Oct, 19</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-3.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New Landing
                                            Design</a></h5>
                                    <p class="text-muted mb-0">For science, music, sport, etc</p>
                                </td>
                                <td>13 Oct, 19</td>
                                <td><span class="badge bg-danger">Delay</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-6.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-4.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">Redesign - Landing
                                            page</a></h5>
                                    <p class="text-muted mb-0">If several languages coalesce</p>
                                </td>
                                <td>14 Oct, 19</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                        R
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-5.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">Skote Dashboard
                                            UI</a></h5>
                                    <p class="text-muted mb-0">Separate existence is a myth</p>
                                </td>
                                <td>22 Oct, 19</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-6.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">Blog Template
                                            UI</a></h5>
                                    <p class="text-muted mb-0">For science, music, sport, etc</p>
                                </td>
                                <td>24 Oct, 19</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><img src="{{ URL::asset('/assets/images/companies/img-3.png') }}" alt=""
                                        class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">Multipurpose
                                            Landing</a></h5>
                                    <p class="text-muted mb-0">It will be as simple as Occidental</p>
                                </td>
                                <td>15 Oct, 19</td>
                                <td><span class="badge bg-danger">Delay</span></td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-success"><i
                        class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection
