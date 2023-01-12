@extends('admin.layouts.main_layouts')

@section('content')
    @include('admin.partial.navbar')
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="projectsTableBody">
                                @foreach ($categories as $category)
                                   <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td class="col-2">{{ $category->name }}</td>
                                    <td class="col-6">{{ $category->description ?? "No description"}}</td>
                                    <td><mark class="@if($category->status == "Active") bg-success @else bg-warning  @endif text-white w-sm-100 w-50 rounded" >{{ $category->status }}</mark></td>
                                    <td class="d-flex"><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary mx-4">Edit</a> <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST"> @csrf <button type="submit" class="btn btn-danger">Delete</button></form></td>

                                   </tr>
                                @endforeach
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
@endsection