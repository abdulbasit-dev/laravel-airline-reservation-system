@extends('layouts.master')

@section('title') @lang('translation.Customers') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Ecommerce @endslot
        @slot('title') Customers @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> New Customers</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Phone / Email</th>
                                    <th>Address</th>
                                    <th>Rating</th>
                                    <th>Wallet Balance</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                            <label class="form-check-label" for="customerlistcheck01"></label>
                                        </div>
                                    </td>
                                    <td>Stephen Rash</td>
                                    <td>
                                        <p class="mb-1">325-250-1106</p>
                                        <p class="mb-0">StephenRash@teleworm.us</p>
                                    </td>

                                    <td>2470 Grove Street
                                        Bethpage, NY 11714</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.2</span></td>
                                    <td>$5,412</td>
                                    <td>07 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck02">
                                            <label class="form-check-label" for="customerlistcheck02"></label>
                                        </div>
                                    </td>
                                    <td>Juan Mays</td>
                                    <td>
                                        <p class="mb-1">443-523-4726</p>
                                        <p class="mb-0">JuanMays@armyspy.com</p>
                                    </td>

                                    <td>3755 Harron Drive
                                        Salisbury, MD 21875</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.0</span></td>
                                    <td>$5,632</td>
                                    <td>06 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck03">
                                            <label class="form-check-label" for="customerlistcheck03"></label>
                                        </div>
                                    </td>
                                    <td>Scott Henry</td>
                                    <td>
                                        <p class="mb-1">704-629-9535</p>
                                        <p class="mb-0">ScottHenry@jourrapide.com</p>
                                    </td>

                                    <td>3632 Snyder Avenue
                                        Bessemer City, NC 28016</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.4</span></td>
                                    <td>$7,523</td>
                                    <td>06 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck04">
                                            <label class="form-check-label" for="customerlistcheck04"></label>
                                        </div>
                                    </td>
                                    <td>Cody Menendez</td>
                                    <td>
                                        <p class="mb-1">701-832-5838</p>
                                        <p class="mb-0">CodyMenendez@armyspy.com</p>
                                    </td>

                                    <td>4401 Findley Avenue
                                        Minot, ND 58701</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.1</span></td>
                                    <td>$6,325</td>
                                    <td>05 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck05">
                                            <label class="form-check-label" for="customerlistcheck05"></label>
                                        </div>
                                    </td>
                                    <td>Jason Merino</td>
                                    <td>
                                        <p class="mb-1">706-219-4095</p>
                                        <p class="mb-0">JasonMerino@dayrep.com</p>
                                    </td>

                                    <td>3159 Holly Street
                                        Cleveland, GA 30528</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            3.8</span></td>
                                    <td>$4,523</td>
                                    <td>04 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck06">
                                            <label class="form-check-label" for="customerlistcheck06"></label>
                                        </div>
                                    </td>
                                    <td>Kyle Aquino</td>
                                    <td>
                                        <p class="mb-1">415-232-5443</p>
                                        <p class="mb-0">KyleAquino@teleworm.us</p>
                                    </td>

                                    <td>4861 Delaware Avenue
                                        San Francisco, CA 94143</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.0</span></td>
                                    <td>$5,412</td>
                                    <td>03 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck07">
                                            <label class="form-check-label" for="customerlistcheck07"></label>
                                        </div>
                                    </td>
                                    <td>David Gaul</td>
                                    <td>
                                        <p class="mb-1">314-483-4679</p>
                                        <p class="mb-0">DavidGaul@teleworm.us</p>
                                    </td>

                                    <td>1207 Cottrill Lane
                                        Stlouis, MO 63101</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.2</span></td>
                                    <td>$6,180</td>
                                    <td>02 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="customerlistcheck08">
                                            <label class="form-check-label" for="customerlistcheck08"></label>
                                        </div>
                                    </td>
                                    <td>John McCray</td>
                                    <td>
                                        <p class="mb-1">253-661-7551</p>
                                        <p class="mb-0">JohnMcCray@armyspy.com</p>
                                    </td>

                                    <td>3309 Horizon Circle
                                        Tacoma, WA 98423</td>
                                    <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i>
                                            4.1</span></td>
                                    <td>$5,2870</td>
                                    <td>02 Oct, 2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                        Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i
                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
