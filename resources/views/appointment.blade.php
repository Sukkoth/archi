@extends('layouts.main_layout')

@section('content')

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('/') }}"" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="me-3" src="{{asset('customs/img/icons/icon-1.png')}}" alt="Icon">{{ App\Models\BusinessSetting::where('businessName', 'aboutUs')->first()->businessValue['name'];  }}</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('/') }}"" class="nav-item nav-link">Home</a>
                <a href="{{ route('projects') }}" class="nav-item nav-link">Projects</a>
                <a href="{{ route('about') }}"" class="nav-item nav-link">About</a>
                <a href="{{ route('services') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('contact') }}".html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('appointment.create') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Appointment</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title">Appointment</h4>
                    <h1 class="display-5 mb-4">Make An Appointment To Start Your Dream Project</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                    style="width: 65px; height: 65px;">
                                    <i class="fa fa-2x fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-2">Call Us Now</p>
                                    <h3 class="mb-0">{{ $companyContact['phone']}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                    style="width: 65px; height: 65px;">
                                    <i class="fa fa-2x fa-envelope-open text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-2">Mail Us Now</p>
                                    <h3 class="mb-0">{{$companyContact['email']}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-pin-angle-fill h2 text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <a class="btn btn-primary w-100 py-3" data-bs-toggle="modal" href="#exampleModal"
                                        role="button">Check your appointments here...</a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Your Name"
                                    style="height: 55px;" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    style="height: 55px;" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" name="phoneNumber"
                                    placeholder="Your Mobile (+2519 or +2517...)" style="height: 55px;"
                                    value="{{ old('phoneNumber') }}">
                                @error('phoneNumber')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select" style="height: 55px;" name="service">
                                    <option selected>Choose Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 2</option>
                                    <option value="3">Service 3</option>
                                </select>
                                @error('service')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" name="date" class="form-control datetimepicker-input"
                                        placeholder="Choose Date" data-target="#date" data-toggle="datetimepicker"
                                        style="height: 55px;" value="{{ old('date') }}">
                                    @error('date')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" name="time" class="form-control datetimepicker-input"
                                        placeholder="Choose Date" data-target="#time" data-toggle="datetimepicker"
                                        style="height: 55px;" value="{{ old('time') }}">
                                    @error('time')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="message">Your message in here</label>
                                <textarea class="form-control" rows="5" name="message" placeholder="Message"> {{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="appointmentCheckModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="appointmentCheckModalBody">
                    <div class="col-12 col-sm-12">
                        <input type="text" class="form-control" name="checkAppointmentPhoneNumber"
                            id="checkAppointmentPhoneNumber" placeholder="Your Mobile (+2519 or +2517...)"
                            style="height: 55px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeAppointmentModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="checkAppointment()"
                        id="checkMyAppointment">Check appointment</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script>
        // check appointment

        function checkAppointment() {
           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = {
                phoneNumber: jQuery('#checkAppointmentPhoneNumber').val(),

            };
            $("#appointmentCheckModalBody").empty();
            $("#appointmentCheckModalBody").append(`<div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>` );
            $.ajax({
                type: "POST",
                url: '{{ route('appointment.show') }}',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    $("#appointmentCheckModalBody").empty();
                    $("#checkMyAppointment").remove();
                    $("#appointmentCheckModal").addClass("modal-xl");

                    $("#appointmentCheckModalBody").append(`
                        <table class="table table-hover table-sm table-bordered id="appointmentsTable">
                                <thead>
                                <tr>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id="tableBody">
                            </tbody>
                        </table>
                    `);
                    for (let appointment in data) {
                        $("#tableBody").append(`<tr id="appointment`+ data[appointment].id +`">
                                    <td>` + data[appointment].message + `</td>
                                    <td>` + data[appointment].status + `</td>
                                    <td>` + data[appointment].date + `</td>
                                    <td>` + data[appointment].time + `</td>
                                    <td><button class="btn btn-danger" onClick="withdrawAppointment(`+ data[appointment].id+`)">Withdraw</button></td>
                                </tr>`);
                    }
                },
                error: function(errors) {
                    $( "#closeAppointmentModal" ).click();
                    for (let error in errors.responseJSON.errors) {
                        toastr.info(errors.responseJSON.errors[error]);
                    }
                    $("#appointmentCheckModalBody").empty();
                    $("#appointmentCheckModalBody").append(
                    `
                    <div class="col-12 col-sm-12">
                        <input type="text" class="form-control" name="checkAppointmentPhoneNumber"
                            id="checkAppointmentPhoneNumber" placeholder="Your Mobile (+2519 or +2517...)"
                            style="height: 55px;">
                    </div>
                    `);
                }
            });

        }
    </script>

<script>
    function withdrawAppointment(id){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = {
                id: id
            };
            $.ajax({
                type: "POST",
                url: '{{ route('appointment.delete') }}',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    toastr.success(data.message);
                    $("#appointment"+id).remove();
                    if($.trim($("#tableBody").html())==''){
                        $("#appointmentCheckModalBody").empty();
                        $("#appointmentCheckModalBody").append(`<h1 class="text text-primary">You have no appointments</h1>`);
                    }
                },
                error: function(errors) {
                    for (let error in errors.responseJSON.errors) {
                        toastr.error(errors.responseJSON.errors[error]);
                    }
                }
            });

    }
</script>
