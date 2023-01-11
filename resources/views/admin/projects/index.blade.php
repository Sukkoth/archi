@extends('admin.layouts.main_layouts')

@section('content')
    @include('admin.partial.navbar')
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
@endsection



@section('scripts')
    <script>
        var currentPath = "{{ route('admin.fetchProjects') }}";
        $(document).ready(function() {
            fetchProjectsData(currentPath);
        });
    </script>
    <script>
        //fetch and display projects
        function fetchProjectsData(requestUrl=currentPath) {
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
                url: requestUrl,
                dataType: 'json',
                success: function(response) {
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
                            <td> <a href="{{ config('app.url') }}/admin/projects/show/`+response.projects.data[project].id+`"> <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-arrow-right"></i></button> </a></td>
                        </tr>`);
                    }
                    console.log("requestURL", requestUrl);

                    //previous pages
                    if (response.projects.current_page == 1) {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData(` + response.projects.links.first_page_url +`)" class="btn btn-success mx-2" disabled>First</button>
                        `);
                    } else {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData(` + response.projects.links.first_page_url + `)" class="btn btn-success mx-2">First</button>
                        `);
                    }

                    for (var i = response.projects.current_page - 2; i < response.projects.current_page; i++) {
                        if (i > 0) {
                            $('#projectsPagination').append(`
                                <button type="button" onclick = "fetchProjectsData('` + response.projects.links[i].url +
                                `')" class="btn btn-primary mx-1">` + i + `</button>
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
                                <button type="button" onclick = "fetchProjectsData('` + response.projects.links[i].url +
                            `')"  class="btn btn-primary mx-1">` + i + `</button>
                            `);
                        if (i == response.projects.current_page + 2) break;
                    }
                    if (response.projects.last_page == response.projects.current_page) {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData('` + response.projects.last_page_url +`')" class="btn btn-success mx-2" disabled>Last</button>
                        `);
                    } else {
                        $('#projectsPagination').append(`
                            <button type="button" onclick = "fetchProjectsData('` + response.projects.last_page_url + `')" class="btn btn-success mx-2">Last</button>
                        `);
                    }
                },
                error: function(errors) {
                    console.log(errors);
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
            let typeFilters = "?filter[type]=";
            let locationFilters = "&filter[location]=";
            $("#typeFilters input:checkbox:checked").each(function() {
                typeFilters+=$(this).val() + ',';
            });

            $("#locationFilters input:checkbox:checked").each(function() {
                locationFilters+=$(this).val() + ',';
            });
            fetchProjectsData(currentPath + typeFilters + locationFilters);
        }
    </script>
@endsection
