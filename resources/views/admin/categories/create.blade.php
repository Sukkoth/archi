@extends('admin.layouts.main_layouts')

@section('content')
    @include('admin.partial.navbar')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-6">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">About Company</h6>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{ old('name') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Describe your category here" id="description"
                                name="description" style="height: 150px;">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Category Status</label>
                            <select class="form-select" style="height: 55px;" name="status">
                                <option disabled>Choose Status</option>
                                <option value="true" selected>Active</option>
                                <option value="false">Disabled</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
