@extends('admin.layouts.main_layouts')

@section('content')
    @include('admin.partial.navbar')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-6">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">About Company</h6>
                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Project title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Project Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                                value="{{ old('location') }}" required>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="type" class="form-label">Project Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                                value="{{ old('type') }}">
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="size" class="form-label">Project Size</label>
                            <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size"
                                value="{{ old('size') }}">
                            @error('size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Project Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                                value="{{ old('status') }}">
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="startDate class="form-label">Project Start Date</label>
                            <input type="date" class="form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate"
                                value="{{ old('startDate') }}">
                            @error('startDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="endDate class="form-label">Project End Date</label>
                            <input type="date" class="form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate"
                                value="{{ old('endDate') }}">
                            @error('endDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Describe your project here" id="description"
                                name="description" style="height: 150px;" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success" id="update-about-company">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection