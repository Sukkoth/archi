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
                        <img class="rounded-circle" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->firstName}} {{Auth::user()->lastName}}</h6>
                        <span>{{Auth::user()->position}}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="{{route('edit-info')}}" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Edit Info</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Projects</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.projects') }}" class="dropdown-item">All Projects</a>
                            <a href="signup.html" class="dropdown-item">Add new Project</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        @endsection
        <!-- Sidebar End -->

        @section('content') {{--Content start--}}
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
                                    <img class="rounded-circle" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
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
                            <img class="rounded-circle me-lg-2" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->firstName}}</span>
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

            {{-- About company --}}
            <div class="container-fluid pt-4 px-4">
                <div class="row g-6">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">About Company</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName" disabled value="{{ $aboutCompany['name'] }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="companySlogan" class="form-label">Company Slogan</label>
                                    <input type="text" class="form-control" id="companySlogan" disabled value="{{ $aboutCompany['slogan'] }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="companyExperience" class="form-label">Experience Yers</label>
                                    <input type="number" class="form-control" id="companyExperience" disabled value="{{ $aboutCompany['experience'] }}">
                                </div>

                                <div class="mb-3">
                                    <label for="companyDescription">Description</label>
                                    <textarea class="form-control" placeholder="Describe your comany here" disabled
                                        id="companyDescription" style="height: 150px;" required>{{ $aboutCompany['description'] }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" disabled id="update-about-company">Update</button>
                                <button class="btn btn-danger" id="edit_company_info" type="button">Edit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Contact information</h6>
                            <form>
                                <div class="row mb-3">
                                    <label for="companyEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyEmail" value="{{ $companyContact['email'] }}" disabled placeholder="email@email.com">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyAddress" value="{{ $companyContact['address'] }}" disabled placeholder="detailed company address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyPhone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyPhone" value="{{ $companyContact['phone'] }}" disabled placeholder="+2519, +2517">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyTelephone" class="col-sm-2 col-form-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyTelephone" value="{{ $companyContact['telephone'] }}" disabled placeholder="telephone">
                                    </div>
                                </div>
                                
                                <button id="update-company-contact" class="btn btn-primary" disabled>Update</button>
                                <button class="btn btn-danger" id="edit_company_contact" type="button">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
            {{-- About Company --}}
@endsection {{--Content end--}}



@section('scripts')
<script>
    $("#edit_company_info").click(function(){
        document.getElementById("companyName").disabled = false;
        document.getElementById("companySlogan").disabled = false;
        document.getElementById("companyDescription").disabled = false;
        document.getElementById("companyExperience").disabled = false;
        document.getElementById("update-about-company").disabled = false;
  });

  $("#edit_company_contact").click(function(){
        document.getElementById("companyEmail").disabled = false;
        document.getElementById("companyAddress").disabled = false;
        document.getElementById("companyPhone").disabled = false;
        document.getElementById("companyTelephone").disabled = false;
        document.getElementById("update-company-contact").disabled = false;
  });
</script>
<script>
    // Update Company info
    $("#update-about-company").click(function (e) {
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
            url: '{{route('update_about_company')}}',
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data.data.message);
                toastr.success(data.data.message);
                document.getElementById("companyName").disabled = true;
                document.getElementById("companySlogan").disabled = true;
                document.getElementById("companyDescription").disabled = true;
                document.getElementById("companyExperience").disabled = true;
                document.getElementById("update-about-company").disabled = true;
            },
            error: function (errors) {
                for (let error in errors.responseJSON.errors) { 
                    toastr.error(errors.responseJSON.errors[error]);
                }
            }
        });
    });
</script>

<script>
    // Update Company contact info
    $("#update-company-contact").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            companyEmail: jQuery('#companyEmail').val(),
            companyAddress: jQuery('#companyAddress').val(),
            companyPhone: jQuery('#companyPhone').val(),
            companyTelephone: jQuery('#companyTelephone').val()
        };
        $.ajax({
            type: "POST",
            url: '{{route('update_company_contact')}}',
            data: formData,
            dataType: 'json',
            success: function (data) {
                toastr.success(data.message);
                document.getElementById("companyEmail").disabled = true;
                document.getElementById("companyAddress").disabled = true;
                document.getElementById("companyPhone").disabled = true;
                document.getElementById("companyTelephone").disabled = true;
                document.getElementById("update-company-contact").disabled = true;
            },
            error: function (errors) {
                for (let error in errors.responseJSON.errors) { 
                    toastr.error(errors.responseJSON.errors[error]);
                }
            }
        });
    });
</script>
@endsection
