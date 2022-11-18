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
                <a href="{{ route('projects') }}" class="nav-item nav-link active">Projects</a>
                <a href="{{ route('about') }}"" class="nav-item nav-link">About</a>
                <a href="{{ route('services') }}".html" class="nav-item nav-link">Services</a>
                <a href="{{ route('contact') }}".html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('appointment.create') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Appointment</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-4">{{$project->title}}</h1>
            </div>
        </div>
    </div>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s" id="viewProject">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('customs/img/carousel-1.jpg')}}'>">
                <img class="img-fluid" src="{{asset('customs/img/carousel-1.jpg')}}" alt="">
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('customs/img/carousel-2.jpg')}}'>">
                <img class="img-fluid" src="{{asset('customs/img/carousel-2.jpg')}}" alt="">
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('customs/img/carousel-3.jpg')}}'>">
                <img class="img-fluid" src="{{asset('customs/img/carousel-3.jpg')}}" alt="">
            </div>
        </div>

    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                <h4 class="section-title">About the project</h4>
                <h1 class="display-5 mb-4">{{$project->title}}</h1>
                <div class="d-flex align-items-center mb-5">
                    <div class="ps-4">
                        <h3 class="section-title">Year</h3><h4>{{$project->startDate}}</h4>
                        <h3 class="section-title">Location</h3><h4>{{$project->location}}</h4>
                        <h3 class="section-title">Category</h3><h4 style="text-transform: uppercase">{{$project->type}}</h4>
                    </div>
                </div>
                <p style="text-align:justify">{{$project->description}}</p>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
