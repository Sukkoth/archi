@extends('layouts.main_layout')

@section('content')
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('/') }}"" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="me-3" src="{{asset('customs/img/icons/icon-1.png')}}" alt="Icon">Arkitektur</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('/') }}"" class="nav-item nav-link">Home</a>
                <a href="{{ route('projects') }}" class="nav-item nav-link active">Projects</a>
                <a href="{{ route('about') }}"" class="nav-item nav-link">About</a>
                <a href="{{ route('services') }}".html" class="nav-item nav-link">Services</a>
                <a href="{{ route('contact') }}".html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('appointment.create') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Appointment</a>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Our Projects</h4>
                <h1 class="display-5 mb-4">Visit Our Latest Projects And Our Innovative Works</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        @foreach ($recentProjects as $project)
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 {{ $loop->iteration == 1 ? 'active' : ' '}}"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $project->id }}" type="button">
                                <h3 class="m-0">{{ $loop->iteration }}. {{ $project->title }}</h3>
                                @php if ($loop->iteration == 4) break; @endphp
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        @foreach ($recentProjects as $project)
                            <div class="tab-pane fade {{$loop->iteration == 1 ? 'show active' : ' '}}" id="tab-pane-{{ $project->id }}">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100"
                                                src="customs/img/project-1.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">{{$project->title}}</h1>
                                        <p class="mb-4 project-text-overflow">{{$project->description}}</p>
                                        <p style="text-transform: uppercase"><i class="fa fa-check text-primary me-3" ></i>{{$project->type}} PROJECT</p>
                                        <a href="{{ route('view_project', $project->id) }}" class="btn btn-primary py-3 px-5 mt-3">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                            @php if ($loop->iteration == 4) break; @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
