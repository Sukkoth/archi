@extends('admin.layouts.main_layouts')

<!-- Sidebar Start -->
@section('sidebar')
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset('customs/admin/img/user.jpg') }}" alt=""
                        style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h6>
                    <span>{{ Auth::user()->position }}</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div>
                <a href="{{ route('edit-info') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Edit Info</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>Projects</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('admin.projects') }}" class="dropdown-item">All Projects</a>
                        <a href="signup.html" class="dropdown-item">Add new Project</a>
                    </div>
                </div>
                <div class="nav-item dropdown mt-2">
                    <a href="#" class="nav-link dropdown-toggle" id="filterExpand" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>Filter</a>
                    <div class="dropdown-menu bg-transparent border-0 px-5 py-2">
                        <h6>Type</h6>
                        <form id="typeFilters">
                            @foreach (App\Models\Project::select('type')->distinct('type')->get()->pluck('type') as $item)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $item }}"
                                    id="typeFilter{{ $item }}">
                                <label class="form-check-label text-lowercase" for="typeFilter{{ $item }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        </form>

                        <h6>Location</h6>
                        <form id="locationFilters">
                            @foreach (App\Models\Project::select('location')->distinct('location')->get()->pluck('location') as $item)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $item }}"
                                    id="typeFilter{{ $item }}">
                                <label class="form-check-label" for="typeFilter{{ $item }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        </form>
                        <button class="btn btn-primary" type="button" onclick="filterProjects()">Filter</button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
@endsection
<!-- Sidebar End -->

@section('content')
    {{-- Content start --}}
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="{{ asset('customs/admin/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="{{ asset('customs/admin/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="{{ asset('customs/admin/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificatin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Profile updated</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New user added</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Password changed</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="{{ asset('customs/admin/img/user.jpg') }}" alt=""
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">{{ Auth::user()->firstName }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">My Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" id="projectsCount">Projects </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="projectsTableBody">

                                {{-- APPEND DATA HERE --}}

                            </tbody>
                        </table>

                        <div class="btn-group me-2" role="group" aria-label="First group" id="projectsPagination">
                            {{-- append pagination links here --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection {{-- Content end --}}



@section('scripts')
    <script>
        $("#edit_company_info").click(function() {
            document.getElementById("companyName").disabled = false;
            document.getElementById("companySlogan").disabled = false;
            document.getElementById("companyDescription").disabled = false;
            document.getElementById("companyExperience").disabled = false;
            document.getElementById("update-about-company").disabled = false;
        });

        $("#edit_company_contact").click(function() {
            document.getElementById("companyEmail").disabled = false;
            document.getElementById("companyAddress").disabled = false;
            document.getElementById("companyPhone").disabled = false;
            document.getElementById("companyTelephone").disabled = false;
            document.getElementById("update-company-contact").disabled = false;
        });
    </script>
    <script>
        // Update Company info
        $("#update-about-company").click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                companyName: jQuery('#companyName').val(),
                companySlogan: jQuery('#companySlogan').val(),
                companyExperienceYears: jQuery('#companyExperience').val(),
                companyDescription: jQuery('#companyDescription').val()
            };
            $.ajax({
                type: "POST",
                url: '{{ route('update_about_company') }}',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    console.log(data.data.message);
                    toastr.success(data.data.message);
                    document.getElementById("companyName").disabled = true;
                    document.getElementById("companySlogan").disabled = true;
                    document.getElementById("companyDescription").disabled = true;
                    document.getElementById("companyExperience").disabled = true;
                    document.getElementById("update-about-company").disabled = true;
                },
                error: function(errors) {
                    for (let error in errors.responseJSON.errors) {
                        toastr.error(errors.responseJSON.errors[error]);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var currentPath = null;
            $('#filterExpand').dropdown('show');
            fetchProjectsData();
        });
    </script>
    <script>
        //fetch and display projects
        function fetchProjectsData(page = 1) {
            $("#projectsTableBody").empty();
            $("#projectsPagination").empty();
            $("#projectsTableBody").append(`
        <th scope="row">
            <div class="spinner-border" style="width: 6rem; height: 6rem; margin-left:100%" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </th>
        `);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: '{{ route('admin.fetchProjects') }}',
                dataType: 'json',
                data: {
                    page: page
                },
                success: function(response) {
                    console.log(response.projects.data);
                    $("#projectsTableBody").empty();
                    $("#projectsCount").text("Projects (" + response.projects.total + " results)");
                    for (let project in response.projects.data) {
                        $("#projectsTableBody").append(`<tr id="project` + response.projects.data[project].id + `">
                            <th scope="row">` + response.projects.data[project].id + `</th>
                            <td>` + response.projects.data[project].title + `</td>
                            <td>` + response.projects.data[project].type + `</td>
                            <td>` + response.projects.data[project].size + `</td>
                            <td>` + response.projects.data[project].location + `</td>
                            <td>` + response.projects.data[project].startDate + `</td>
                            <td>` + response.projects.data[project].endDate + `</td>
                            <td> <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-arrow-right"></i></button></td>
                        </tr>`);
                    }
                    console.log("current_page " + response.projects.current_page);

                    //previous pages
                    if (response.projects.current_page == 1) {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData()" class="btn btn-success mx-2" disabled>First</button>
                        `);
                    } else {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData()" class="btn btn-success mx-2">First</button>
                        `);
                    }

                    for (var i = response.projects.current_page - 2; i < response.projects.current_page; i++) {
                        if (i > 0) {
                            $('#projectsPagination').append(`
                                <button type="button" onclick = "fetchProjectsData(` + i +
                                `)" class="btn btn-primary mx-1">` + i + `</button>
                            `);
                        }
                    }

                    //current page

                    $('#projectsPagination').append(`
                        <button type="button"  class="btn btn-warning mx-1">` + response.projects
                        .current_page + `</button>
                    `);


                    //next pages

                    for (var i = response.projects.current_page + 1; i <= response.projects.last_page; i++) {
                        $('#projectsPagination').append(`
                                <button type="button" onclick = "fetchProjectsData(` + i +
                            `)"  class="btn btn-primary mx-1">` + i + `</button>
                            `);
                        if (i == response.projects.current_page + 2) break;
                    }
                    if (response.projects.last_page == response.projects.current_page) {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData(` + response.projects.last_page + `)" class="btn btn-success mx-2" disabled>Last</button>
                        `);
                    } else {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData(` + response.projects.last_page + `)" class="btn btn-success mx-2">Last</button>
                        `);
                    }
                    currentPath = response.projects.path;
                    $('#filterExpand').dropdown('show');

                },
                error: function(errors) {
                    console.log(errors.responseJSON);
                    $("#projectsTableBody").empty();
                    $("#projectsTableBody").append("<h1>No Data</h1>");
                    for (let error in errors.responseJSON.errors) {
                        toastr.error(errors.responseJSON.errors[error]);
                    }
                }
            });

        }
    </script>

    <script>
        function filterProjects() {
            console.log(currentPath);
            console.log("TYPE FILTERS");
            $("#typeFilters input:checkbox:checked").each(function() {
                $(this).val();
            });

            console.log("LOCATION FILTERS");
            $("#locationFilters input:checkbox:checked").each(function() {
                console.log($(this).val());
            });

            $('#filterExpand').dropdown('show');
        }
    </script>
@endsection
