@extends('layouts.master')

@section('title') @lang('translation.Kanban_Board') @endsection

@section('css')
    <!-- dragula css -->
    <link href="{{ URL::asset('/assets/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Tasks @endslot
        @slot('title') Kanban Board @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">Upcoming</h4>
                    <div id="task-1">
                        <div id="upcoming-task" class="pb-1 task-list">

                            <div class="card task-box" id="uptask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#uptask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Topnav layout design</a></h5>
                                        <p class="text-muted mb-4">14 Oct, 2019</p>
                                    </div>
                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                        3+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="uptask-2">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#uptask-2">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-primary font-size-12" id="task-status">Approved</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a New Landing UI</a></h5>
                                        <p class="text-muted">15 Oct, 2019</p>
                                    </div>
                                    
                                    <ul class="ps-3 mb-4 text-muted" id="task-desc">
                                        <li class="py-1">Separate existence is a myth.</li>
                                        <li class="py-1">For music, sport, etc</li>
                                    </ul>
                                    
                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 112</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="uptask-3">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#uptask-3">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Skote Logo</a></h5>
                                        <p class="text-muted mb-4">15 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                        9+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                        </div>

                        <div class="text-center d-grid">
                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">In Progress</h4>
                    <div id="task-2">
                        <div id="inprogress-task" class="pb-1 task-list">
                            <div class="card task-box" id="intask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#intask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Brand logo design</a></h5>
                                        <p class="text-muted">12 Oct, 2019</p>
                                    </div>

                                    <ul class="list-inine ps-0 mb-4">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="{{ URL::asset('/assets/images/companies/img-1.png') }}" alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="{{ URL::asset('/assets/images/companies/img-2.png') }}" alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="{{ URL::asset('/assets/images/companies/img-3.png') }}" alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 132</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="intask-2">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#intask-2">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-warning font-size-12" id="task-status">Pending</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Blog Template UI</a></h5>
                                        <p class="text-muted mb-4">13 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-6.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                        3+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 103</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="intask-3">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#intask-3">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Skote Dashboard UI</a></h5>
                                        <p class="text-muted mb-4">13 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                        7+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 94</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                        </div>

                        <div class="text-center d-grid">
                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#inprogress-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">Completed</h4>
                    <div id="task-3">
                        <div id="complete-task" class="pb-1 task-list">
                            <div class="card task-box" id="cmptask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#cmptask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Redesign - Landing page</a></h5>
                                        <p class="text-muted mb-4">10 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-3">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="cmptask-2">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#cmptask-2">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Multipurpose Landing</a></h5>
                                        <p class="text-muted">09 Oct, 2019</p>
                                    </div>
                                    
                                    <ul class="list-inline mb-4">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="{{ URL::asset('/assets/images/small/img-4.jpg') }}" class="rounded" alt="" height="48">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="{{ URL::asset('/assets/images/small/img-5.jpg') }}" class="rounded" alt="" height="48">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="{{ URL::asset('/assets/images/small/img-6.jpg') }}" class="rounded" alt="" height="48">
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-6.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-pink text-white font-size-16">
                                                        5+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 92</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="cmptask-3">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#cmptask-3">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Skote landing Psd</a></h5>
                                        <p class="text-muted mb-4">15 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                                <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                        2+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end task card -->

                        </div>

                        <div class="text-center d-grid">
                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#complete-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div id="modalForm" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 add-task-title">Add New Task</h5>
                    <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="NewtaskForm" role="form">
                        <div class="form-group mb-3">
                            <label for="taskname" class="col-form-label">Task Name<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input id="taskname" name="taskname" type="text" class="form-control validate" placeholder="Enter Task Name..." required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-form-label">Task Description</label>
                            <div class="col-lg-12">
                                <textarea id="taskdesc" class="form-control" name="taskdesc"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="col-form-label">Add Team Member<span class="text-danger">*</span></label>
                            <ul class="list-unstyled user-list validate" id="taskassignee">
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-1" name="member[]">
                                        <label class="form-check-label ms-2" for="member-1">Albert Rodarte</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-2" name="member[]">
                                        <label class="form-check-label ms-2" for="member-2">Hannah Glover</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-3" name="member[]">
                                        <label class="form-check-label ms-2" for="member-3">Adrian Rodarte</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-4" name="member[]">
                                        <label class="form-check-label ms-2" for="member-4">Frank Hamilton</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-5" name="member[]">
                                        <label class="form-check-label ms-2" for="member-5">Justin Howard</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-6" name="member[]">
                                        <label class="form-check-label ms-2" for="member-6">Michael Lawrence</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-6.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-7" name="member[]">
                                        <label class="form-check-label ms-2" for="member-7">Oliver Sharp</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-8" name="member[]">
                                        <label class="form-check-label ms-2" for="member-8">Richard Simpson</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <select class="form-select validate" id="TaskStatus" required>
                                    <option value="" selected>Choose..</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Pending">Pending</option>               
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="taskbudget" class="col-form-label">Budget<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input id="taskbudget" name="taskbudget" type="number" placeholder="Enter Task Budget..." class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <button type="button" class="btn btn-primary" id="addtask">Create Task</button>
                                <button type="button" class="btn btn-primary" id="updatetaskdetail">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                    

@endsection
@section('script')
    <!-- dragula plugins -->
    <script src="{{ URL::asset('/assets/libs/dragula/dragula.min.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ URL::asset('/assets/libs/jquery-validation/jquery-validation.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-kanban.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-form.init.js') }}"></script>
@endsection
