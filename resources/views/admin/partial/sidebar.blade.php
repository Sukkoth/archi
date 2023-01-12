<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('admin') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>NanoArch</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('customs/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->firstName }}</h6>
                <span>{{ Auth::user()->position }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin') }}" class="nav-item nav-link @if(Request::is('admin')) active @endif"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{route('edit-info')}}" class="nav-item nav-link @if(Request::is('admin/edit-info')) active @endif "><i class="fa fa-th me-2"></i>Edit Info</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle @if(Request::is('admin/projects')) active @endif" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Projects</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.projects') }}" class="dropdown-item">All Projects</a>
                    <a href="{{ route('admin.projects.create') }}" class="dropdown-item">Add new Project</a>
                </div>
                @if (Request::is('admin/projects'))
                    <div class="container px-4 mx-4 mt-5">
                        <h4>Filter</h4>
                        <h6>Type</h6>
                        <form id="categoryFilters">
                            @foreach (App\Models\Category::get() as $category)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                    id="categoryFilter{{ $category->id }}">
                                <label class="form-check-label text-lowercase" for="categoryFilter{{ $category->name }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        </form>

                        <h6>Location</h6>
                        <form id="locationFilters">
                            @foreach (App\Models\Project::select('location')->distinct('location')->get()->pluck('location') as $item)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $item }}"
                                    id="categoryFilter{{ $item }}">
                                <label class="form-check-label" for="categoryFilter{{ $item }}">
                                    {{ $item }}
                                </label>
                            </div>
                        @endforeach
                        </form>
                        <button class="btn btn-primary" type="button" onclick="filterProjects()">Filter</button>
                    </div>
                @endif
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle @if(Request::is('admin/categories')) active @endif" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Categories</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.categories.index') }}" class="dropdown-item">List</a>
                    <a href="{{ route('admin.categories.create') }}" class="dropdown-item">New Category</a>
                </div>
            </div>
            

           
        </div>
    </nav>
</div>